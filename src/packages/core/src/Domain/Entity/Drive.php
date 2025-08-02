<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Entity;

use A3Naumov\WebApiDriveContract\DriveInterface;

class Drive implements DriveInterface
{
    public function __construct(
        private readonly ?\Stringable $id,
        private string $name,
    ) {
    }

    public function getId(): ?\Stringable
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
}
