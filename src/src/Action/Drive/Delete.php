<?php

declare(strict_types=1);

namespace App\Action\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Delete\Command;

class Delete
{
    public function __construct(
        private readonly HandlerInterface $deleteDriveUseCase,
    ) {
    }

    public function handle(string $id): void
    {
        $command = new Command(id: $id);
        $this->deleteDriveUseCase->handle($command);
    }
}
