<?php

declare(strict_types=1);

namespace App\Action\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create\Command;

class Create
{
    public function __construct(
        private readonly HandlerInterface $createDriveUseCase,
    ) {
    }

    public function handle(string $name): void
    {
        $command = new Command(
            name: $name,
        );

        $this->createDriveUseCase->handle($command);
    }
}
