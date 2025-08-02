<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Delete;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete\HandlerInterface;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\DriveRepositoryInterface;

class Handler implements HandlerInterface
{
    public function __construct(
        private readonly DriveRepositoryInterface $driveRepository,
    ) {
    }

    public function handle(CommandInterface $command): void
    {
        $drive = $this->driveRepository->findById($command->getId());

        if (!$drive) {
            return;
        }

        $this->driveRepository->delete($drive);
    }
}
