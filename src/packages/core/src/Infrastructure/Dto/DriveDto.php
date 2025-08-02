<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Dto;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\DriveDtoInterface;

class DriveDto implements DriveDtoInterface
{
    public function __construct(
        private readonly string $name,
    ) {
    }

    public function getName(): string
    {
        return $this->name;
    }
}
