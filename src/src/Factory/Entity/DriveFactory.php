<?php

declare(strict_types=1);

namespace App\Factory\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity\DriveFactoryInterface;
use App\Entity\Drive;
use Symfony\Component\Uid\Uuid;

class DriveFactory implements DriveFactoryInterface
{
    public function create(DriveDtoInterface $drive): DriveInterface
    {
        return new Drive(
            id: $drive->getId() ? Uuid::fromString($drive->getId()) : null,
            name: $drive->getName(),
        );
    }
}
