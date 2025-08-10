<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;

interface ResourceRepositoryInterface
{
    public function findById(string $id): ?ResourceInterface;

    /**
     * @return ResourceInterface[]
     */
    public function findByDriveId(string $driveId): array;

    /**
     * @return ResourceInterface[]
     */
    public function findByParentId(string $parentId): array;

    public function save(ResourceInterface $resource): ResourceInterface;
}
