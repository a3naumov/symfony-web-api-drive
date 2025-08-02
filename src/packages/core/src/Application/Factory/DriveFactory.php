<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Factory;

use A3Naumov\WebApiDriveContract\DriveInterface;
use A3Naumov\WebApiDriveCore\Domain\Entity\Drive;

class DriveFactory
{
    public function create(string $name): DriveInterface
    {
        return new Drive(
            id: null,
            name: $name,
        );
    }
}
