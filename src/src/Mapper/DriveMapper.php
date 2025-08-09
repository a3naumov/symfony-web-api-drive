<?php

declare(strict_types=1);

namespace App\Mapper;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use App\Api\Resource\DriveResource;

class DriveMapper
{
    public function toApiResource(DriveDtoInterface $dto): DriveResource
    {
        return new DriveResource(
            id: $dto->getId(),
            name: $dto->getName(),
        );
    }
}
