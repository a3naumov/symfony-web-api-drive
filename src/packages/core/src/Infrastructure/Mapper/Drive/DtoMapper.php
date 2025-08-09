<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Mapper\Drive;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Dto\Drive\DriveDto;

class DtoMapper
{
    public function fromDomain(DriveInterface $drive): DriveDtoInterface
    {
        return new DriveDto(
            id: $drive->getId(),
            name: $drive->getName(),
        );
    }
}
