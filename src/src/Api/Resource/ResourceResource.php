<?php

declare(strict_types=1);

namespace App\Api\Resource;

class ResourceResource implements \JsonSerializable
{
    public function __construct(
        public readonly string $id,
        public readonly string $name,
        public readonly string $type,
        public readonly ?string $parent,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'type' => $this->type,
            'parent' => $this->parent,
        ];
    }
}
