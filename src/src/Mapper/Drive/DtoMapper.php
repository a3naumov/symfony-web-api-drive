<?php

declare(strict_types=1);

namespace App\Mapper\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use App\Api\Request\Drive\CreateRequest;
use App\Api\Resource\DriveResource;
use App\Dto\Drive\DriveDto;

class DtoMapper
{
    public function fromApplicationDto(DriveDtoInterface $driveDto): DriveDto
    {
        return new DriveDto(
            id: $driveDto->getId(),
            driver: $driveDto->getDriver(),
            name: $driveDto->getName(),
        );
    }

    public function fromCreateRequest(CreateRequest $request): DriveDto
    {
        return new DriveDto(
            id: null,
            driver: $request->driver,
            name: $request->name,
        );
    }

    /**
     * @throws \InvalidArgumentException
     */
    public function toApiResource(DriveDto $driveDto): DriveResource
    {
        return new DriveResource(
            id: $driveDto->id ?? throw new \InvalidArgumentException('Drive ID is required'),
            name: $driveDto->name,
        );
    }
}
