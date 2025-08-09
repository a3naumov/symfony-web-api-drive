<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Dto\Drive;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Drive\DriveDtoInterface;

class DriveDto implements DriveDtoInterface
{
    public function __construct(
        private readonly ?string $id,
        private readonly string $name,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }
}
