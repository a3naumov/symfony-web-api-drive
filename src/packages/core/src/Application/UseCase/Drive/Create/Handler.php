<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\Exception\Drive\InvalidDriverException;
use A3Naumov\WebApiDriveCore\Application\Factory\Entity\DriveFactory;
use A3Naumov\WebApiDriveCore\Application\Mapper\Drive\DtoMapper;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\DriveRepositoryInterface;
use A3Naumov\WebApiDriveCore\Domain\Exception\Drive\InvalidDriverException as DomainInvalidDriverException;

class Handler implements HandlerInterface
{
    public function __construct(
        private readonly DriveFactory $driveFactory,
        private readonly DriveRepositoryInterface $driveRepository,
        private readonly DtoMapper $dtoMapper,
    ) {
    }

    public function handle(CommandInterface $command): DriveDtoInterface
    {
        try {
            $drive = $this->driveRepository->save(
                drive: $this->driveFactory->create($this->dtoMapper->fromDriveCreateCommand($command)),
            );
        } catch (DomainInvalidDriverException) {
            throw new InvalidDriverException();
        }

        return $this->dtoMapper->fromDomain($drive);
    }
}
