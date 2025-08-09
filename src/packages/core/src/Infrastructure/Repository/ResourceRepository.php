<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Repository;

use A3Naumov\WebApiDriveContract\ResourceInterface;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\ResourceRepositoryInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository\ResourceRepositoryInterface as InfrastructureResourceRepositoryInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Mapper\Resource\EntityMapper;

class ResourceRepository implements ResourceRepositoryInterface
{
    public function __construct(
        private readonly InfrastructureResourceRepositoryInterface $infrastructureRepository,
        private readonly EntityMapper $mapper,
    ) {
    }

    public function save(ResourceInterface $resource): ResourceInterface
    {
        $infrastructureResource = $this->infrastructureRepository->save(
            resource: $this->mapper->fromDomain($resource),
        );

        return $resource;
    }
}
