<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Mapper\Drive;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create;
use A3Naumov\WebApiDriveCore\Application\Dto\Drive\DriveDto;

class DtoMapper
{
    public function fromDomain(DriveInterface $drive): DriveDtoInterface
    {
        return new DriveDto(
            id: $drive->getId(),
            name: $drive->getName(),
        );
    }

    public function fromDriveCreateCommand(Create\CommandInterface $command): DriveDtoInterface
    {
        return new DriveDto(
            id: null,
            name: $command->getName(),
        );
    }
}
