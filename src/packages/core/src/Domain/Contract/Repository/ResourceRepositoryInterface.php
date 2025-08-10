<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Contract\Repository;

use A3Naumov\WebApiDriveContract\ResourceInterface;

interface ResourceRepositoryInterface
{
    public function findById(string $id): ?ResourceInterface;

    public function save(ResourceInterface $resource): ResourceInterface;
}
