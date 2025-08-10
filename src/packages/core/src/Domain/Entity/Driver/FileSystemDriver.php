<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Entity\Driver;

use A3Naumov\WebApiDriveContract\DriverInterface;

class FileSystemDriver implements DriverInterface
{
    public const string CODE = 'fs';

    public function getCode(): string
    {
        return self::CODE;
    }
}
