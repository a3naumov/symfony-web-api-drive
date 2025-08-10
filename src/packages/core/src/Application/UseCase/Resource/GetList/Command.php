<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Resource\GetList;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetList\CommandInterface;

class Command implements CommandInterface
{
    public function __construct(
        private readonly ?string $driveId,
        private readonly ?string $parentId,
    ) {
    }

    public function getDriveId(): ?string
    {
        return $this->driveId;
    }

    public function getParentId(): ?string
    {
        return $this->parentId;
    }
}
