<?php

declare(strict_types=1);

namespace App\Api\Resource;

class DriveResource implements \JsonSerializable
{
    public function __construct(
        public readonly \Stringable $id,
        public readonly string $name,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
        ];
    }
}
