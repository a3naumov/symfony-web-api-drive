<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Entity;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveContract\ResourceInterface;
use A3Naumov\WebApiDriveCore\Domain\Exception\Resource\ResourceNotFoundException;

class Drive implements DriveInterface
{
    public function __construct(
        private readonly ?string $id,
        private string $name,
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

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function addResource(ResourceInterface $resource): static
    {
        if (!$resource->getId()) {
            throw new ResourceNotFoundException();
        }

        return $this;
    }
}
