<?php

declare(strict_types=1);

namespace App\Mapper\Resource;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use App\Api\Request\Resource\CreateRequest;
use App\Api\Resource\ResourceResource;
use App\Dto\Resource\ResourceDto;

class DtoMapper
{
    public function fromApplicationDto(ResourceDtoInterface $resourceDto): ResourceDto
    {
        return new ResourceDto(
            id: $resourceDto->getId(),
            drive: $resourceDto->getDriveId(),
            parent: $resourceDto->getParentId(),
            name: $resourceDto->getName(),
        );
    }

    public function fromCreateRequest(CreateRequest $request): ResourceDto
    {
        return new ResourceDto(
            id: null,
            drive: $request->drive,
            parent: $request->parent,
            name: $request->name,
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function toApiResource(ResourceDto $resourceDto): ResourceResource
    {
        return new ResourceResource(
            id: $resourceDto->id ?? throw new \InvalidArgumentException('Resource ID is required'),
            name: $resourceDto->name,
            parent: $resourceDto->parent,
        );
    }
}
