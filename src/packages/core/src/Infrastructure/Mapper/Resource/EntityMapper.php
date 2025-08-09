<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Mapper\Resource;

use A3Naumov\WebApiDriveContract\ResourceInterface;
use A3Naumov\WebApiDriveCore\Domain\Entity\Resource;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface as InfrastructureResourceInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity\ResourceFactoryInterface;

class EntityMapper
{
    public function __construct(
        private readonly ResourceFactoryInterface $resourceFactory,
        private readonly DtoMapper $dtoMapper,
    ) {
    }

    public function fromDomain(ResourceInterface $resource): InfrastructureResourceInterface
    {
        return $this->resourceFactory->create(
            resourceDto: $this->dtoMapper->fromDomain($resource),
        );
    }

    public function toDomain(InfrastructureResourceInterface $resource): ResourceInterface
    {
        return new Resource(
            id: $resource->getId()?->__toString(),
            driveId: $resource->getDrive()->getId()->__toString(),
            parentId: $resource->getParent()?->getId()?->__toString(),
            name: $resource->getName(),
        );
    }
}
