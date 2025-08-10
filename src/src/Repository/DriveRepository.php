<?php

namespace App\Repository;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository\DriveRepositoryInterface;
use App\Entity\Drive;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Exception\InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<Drive>
 */
class DriveRepository extends ServiceEntityRepository implements DriveRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Drive::class);
    }

    public function findById(string $id): ?DriveInterface
    {
        try {
            $uuid = Uuid::fromString($id);
        } catch (InvalidArgumentException) {
            return null;
        }

        return $this->find(id: $uuid);
    }

    public function save(DriveInterface $drive): DriveInterface
    {
        $emDrive = $drive->getId() ? $this->findById((string) $drive->getId()) : null;
        $emDrive ??= new Drive();

        $emDrive->setDriver($drive->getDriver());
        $emDrive->setName($drive->getName());

        $this->getEntityManager()->persist($emDrive);
        $this->getEntityManager()->flush();

        return $drive;
    }

    public function delete(DriveInterface $drive): void
    {
        $entityManager = $this->getEntityManager();

        $managed = $this->find($drive->getId());

        if ($managed) {
            $entityManager->remove($managed);
            $entityManager->flush();
        }
    }
}
