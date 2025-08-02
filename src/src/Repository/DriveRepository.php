<?php

namespace App\Repository;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository\DriveRepositoryInterface;
use App\Entity\Drive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Drive>
 */
class DriveRepository extends ServiceEntityRepository implements DriveRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drive::class);
    }

    public function save(DriveInterface $drive): void
    {
        $this->getEntityManager()->persist($drive);
        $this->getEntityManager()->flush();
    }
}
