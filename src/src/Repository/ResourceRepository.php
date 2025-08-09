<?php

namespace App\Repository;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository\ResourceRepositoryInterface;
use App\Entity\Resource;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Uid\Exception\InvalidArgumentException;
use Symfony\Component\Uid\Uuid;

/**
 * @extends ServiceEntityRepository<Resource>
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

    public function save(ResourceInterface $resource): ResourceInterface
    {
        $resource = $resource->getId() ? $this->findById($resource->getId()) : $resource;

        $this->getEntityManager()->persist($resource);
        $this->getEntityManager()->flush();

        return $resource;
    }
}
