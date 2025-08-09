<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;

interface DriveFactoryInterface
{
    public function create(DriveDtoInterface $drive): DriveInterface;
}
