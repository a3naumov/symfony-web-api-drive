<?php

declare(strict_types=1);

namespace App\Mapper\Resource;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use App\Api\Resource\ResourceResource;
use App\Dto\Resource\ResourceDto;

class DtoMapper
{
    public function fromApplicationDto(ResourceDtoInterface $resourceDto): ResourceDto
    {
        return new ResourceDto(
            id: $resourceDto->getId(),
            name: $resourceDto->getName(),
            type: 'resource',
            parent: $resourceDto->getParentId(),
        );
    }

    public function toApiResource(ResourceDto $resourceDto): ResourceResource
    {
        return new ResourceResource(
            id: $resourceDto->id,
            name: $resourceDto->name,
            type: $resourceDto->type,
            parent: $resourceDto->parent,
        );
    }
}
