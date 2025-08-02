<?php

declare(strict_types=1);

namespace App\Factory;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\DriveFactoryInterface;
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
