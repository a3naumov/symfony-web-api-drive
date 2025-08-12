<?php

declare(strict_types=1);

namespace App\Dto\Resource;

class ResourceDto
{
    public function __construct(
        public readonly ?string $id,
        public readonly string $drive,
        public readonly ?string $parent,
        public readonly string $name,
    ) {
    }
}
