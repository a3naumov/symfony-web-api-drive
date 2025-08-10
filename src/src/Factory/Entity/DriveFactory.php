<?php

declare(strict_types=1);

namespace App\Factory\Entity;

use A3Naumov\CloudDriveCore\Infrastructure\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\CloudDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\CloudDriveCore\Infrastructure\Contract\Factory\Entity\DriveFactoryInterface;
use App\Entity\Drive;
use App\Repository\DriveRepository;

class DriveFactory implements DriveFactoryInterface
{
    public function __construct(
        private readonly DriveRepository $driveRepository,
    ) {
    }

    public function create(DriveDtoInterface $driveDto): DriveInterface
    {
        $drive = $driveDto->getId() ? $this->driveRepository->findById($driveDto->getId()) : null;
        $drive ??= new Drive();

        $drive->setDriver($driveDto->getDriver());
        $drive->setName($driveDto->getName());

        return $drive;
    }
}
