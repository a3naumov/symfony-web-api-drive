<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Entity;

use A3Naumov\WebApiDriveContract\ResourceInterface;

class Resource implements ResourceInterface
{
    public function __construct(
        private readonly ?string $id,
        private readonly string $driveId,
        private readonly ?string $parentId,
        private string $name,
    ) {
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getDriveId(): string
    {
        return $this->driveId;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
