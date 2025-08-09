<?php

declare(strict_types=1);

namespace App\Factory\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity\ResourceFactoryInterface;
use App\Entity\Resource;
use App\Repository\DriveRepository;
use App\Repository\ResourceRepository;

class ResourceFactory implements ResourceFactoryInterface
{
    public function __construct(
        private readonly DriveRepository $driveRepository,
        private readonly ResourceRepository $resourceRepository,
    ) {
    }

    public function create(ResourceDtoInterface $resourceDto): ResourceInterface
    {
        $resource = $resourceDto->getId() ? $this->resourceRepository->findById($resourceDto->getId()) : null;
        $resource ??= new Resource();

        $resource->setDrive($this->driveRepository->find($resourceDto->getDriveId()));
        $resource->setParent($resourceDto->getParentId() ? $this->resourceRepository->find($resourceDto->getParentId()) : null);
        $resource->setName($resourceDto->getName());

        return $resource;
    }
}
