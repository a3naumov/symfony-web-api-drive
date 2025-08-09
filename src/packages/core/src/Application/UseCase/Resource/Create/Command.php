<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Resource\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create\CommandInterface;

class Command implements CommandInterface
{
    public function __construct(
        private readonly string $driveId,
        private readonly ?string $parentId,
        private readonly string $name,
    ) {
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
}
