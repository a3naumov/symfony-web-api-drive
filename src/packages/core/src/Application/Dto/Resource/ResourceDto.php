<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Dto\Resource;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;

class ResourceDto implements ResourceDtoInterface
{
    public function __construct(
        private readonly ?string $id,
        private readonly string $driveId,
        private readonly ?string $parentId,
        private readonly string $name,
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
}
