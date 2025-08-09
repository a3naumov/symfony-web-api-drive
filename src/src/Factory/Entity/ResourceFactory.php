<?php

declare(strict_types=1);

namespace App\Factory\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity\ResourceFactoryInterface;
use App\Entity\Resource;
use Symfony\Component\Serializer\SerializerInterface;

class ResourceFactory implements ResourceFactoryInterface
{
    public function __construct(
        private readonly SerializerInterface $serializer,
    ) {
    }

    public function create(ResourceDtoInterface $resourceDto): ResourceInterface
    {
        return $this->serializer->deserialize(
            data: $this->serializer->serialize($resourceDto, 'json'),
            type: Resource::class,
            format: 'json',
        );
    }
}
