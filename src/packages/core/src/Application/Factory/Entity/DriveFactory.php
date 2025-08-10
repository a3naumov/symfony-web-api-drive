<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Factory\Entity;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Domain\Entity\Drive;
use A3Naumov\WebApiDriveCore\Domain\Entity\Driver\FileSystemDriver;
use A3Naumov\WebApiDriveCore\Domain\Service\DriverRegistry;

class DriveFactory
{
    public function __construct(
        private readonly DriverRegistry $driverRegistry,
    ) {
    }

    public function create(DriveDtoInterface $driveDto): DriveInterface
    {
        return new Drive(
            id: null,
            driver: $this->driverRegistry->get(FileSystemDriver::CODE),
            name: $driveDto->getName(),
        );
    }
}
