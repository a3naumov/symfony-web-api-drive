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

    public function findById(string $id): ?DriveInterface
    {
        $infrastructureDrive = $this->infrastructureRepository->findById($id);

        return $infrastructureDrive
            ? $this->mapper->toDomain($infrastructureDrive)
            : null;
    }

    public function save(DriveInterface $drive): DriveInterface
    {
        $infrastructureDrive = $this->infrastructureRepository->save(
            drive: $this->mapper->fromDomain($drive),
        );

        return $this->mapper->toDomain($infrastructureDrive);
    }

    public function delete(DriveInterface $drive): void
    {
        $infrastructureDrive = $this->mapper->fromDomain($drive);
        $this->infrastructureRepository->delete($infrastructureDrive);
    }
}
