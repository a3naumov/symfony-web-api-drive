<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Factory\Entity;

use A3Naumov\WebApiDriveContract\ResourceInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Domain\Entity\Resource;

class ResourceFactory
{
    public function create(ResourceDtoInterface $resourceDto): ResourceInterface
    {
        return new Resource(
            id: null,
            driveId: $resourceDto->getDriveId(),
            parentId: $resourceDto->getParentId(),
            name: $resourceDto->getName(),
        );
    }
}
