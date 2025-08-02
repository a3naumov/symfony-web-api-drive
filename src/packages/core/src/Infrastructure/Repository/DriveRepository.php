<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Repository;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\DriveRepositoryInterface as DomainDriveRepositoryInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository\DriveRepositoryInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Mapper\Drive\EntityMapper;

class DriveRepository implements DomainDriveRepositoryInterface
{
    public function __construct(
        private readonly DriveRepositoryInterface $infrastructureRepository,
        private readonly EntityMapper $mapper,
    ) {
    }

    public function save(DriveInterface $drive): DriveInterface
    {
        $infrastructureDrive = $this->mapper->fromDomain($drive);

        $this->infrastructureRepository->save($infrastructureDrive);

        return $this->mapper->toDomain($infrastructureDrive);
    }
}
