<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\CommandInterface;

class Command implements CommandInterface
{
    public function __construct(
        private readonly string $name,
        private readonly string $driver,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }
}
