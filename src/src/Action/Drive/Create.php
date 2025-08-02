<?php

declare(strict_types=1);

namespace App\Action\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create\Command;

class Create
{
    public function __construct(
        private readonly HandlerInterface $createDriveUseCase,
    ) {
    }

    public function handle(string $name): DriveDtoInterface
    {
        $command = new Command(
            name: $name,
        );

        return $this->createDriveUseCase->handle($command);
    }
}
