<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\Factory\DriveFactory;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\DriveRepositoryInterface;

class Handler implements HandlerInterface
{
    public function __construct(
        private readonly DriveFactory $driveFactory,
        private readonly DriveRepositoryInterface $driveRepository,
    ) {
    }

    public function handle(CommandInterface $command): void
    {
        $drive = $this->driveFactory->create($command->getName());
        $this->driveRepository->save($drive);
    }
}
