<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Resource\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\Exception\Drive\DriveNotFoundException;
use A3Naumov\WebApiDriveCore\Application\Factory\Entity\ResourceFactory;
use A3Naumov\WebApiDriveCore\Application\Mapper\Resource\ResourceMapper;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\DriveRepositoryInterface;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\ResourceRepositoryInterface;

class Handler implements HandlerInterface
{
    public function __construct(
        private readonly DriveRepositoryInterface $driveRepository,
        private readonly ResourceRepositoryInterface $resourceRepository,
        private readonly ResourceFactory $resourceFactory,
        private readonly ResourceMapper $resourceMapper,
    ) {
    }

    public function handle(CommandInterface $command): ResourceDtoInterface
    {
        $drive = $this->driveRepository->findById($command->getDriveId());

        if (!$drive) {
            throw new DriveNotFoundException();
        }

        $resource = $this->resourceRepository->save(
            resource: $this->resourceFactory->create($this->resourceMapper->fromResourceCreateCommand($command)),
        );

        $drive->addResource($resource);

        return $this->resourceMapper->fromDomain($resource);
    }
}
