<?php

declare(strict_types=1);

namespace App\Dto\Drive;

class DriveDto
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $driver,
        public readonly string $name,
    ) {
    }
}
