<?php

declare(strict_types=1);

namespace App\Repository;

use A3Naumov\CloudDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use A3Naumov\CloudDriveCore\Infrastructure\Contract\Repository\ResourceRepositoryInterface;
use App\Entity\Resource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Exception\InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<resource>
 */
class ResourceRepository extends ServiceEntityRepository implements ResourceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Resource::class);
    }

    public function findById(string $id): ?ResourceInterface
    {
        try {
            $uuid = Uuid::fromString($id);
        } catch (InvalidArgumentException) {
            return null;
        }

        return $this->find(id: $uuid);
    }

    public function findByDriveId(string $driveId): array
    {
        try {
            $uuid = Uuid::fromString($driveId);
        } catch (InvalidArgumentException) {
            return [];
        }

        return $this->findBy(['drive' => $uuid, 'parent' => null]);
    }

    public function findByParentId(string $parentId): array
    {
        try {
            $uuid = Uuid::fromString($parentId);
        } catch (InvalidArgumentException) {
            return [];
        }

        return $this->findBy(['parent' => $uuid]);
    }

    public function save(ResourceInterface $resource): ResourceInterface
    {
        $emResource = $resource->getId() ? $this->findById((string) $resource->getId()) : null;
        $emResource ??= new Resource();

        $emResource->setDrive($resource->getDrive());
        $emResource->setParent($resource->getParent());
        $emResource->setName($resource->getName());

        $this->getEntityManager()->persist($emResource);
        $this->getEntityManager()->flush();

        return $emResource;
    }
}
