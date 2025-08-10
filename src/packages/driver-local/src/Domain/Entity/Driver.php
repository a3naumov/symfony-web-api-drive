<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveDriverLocal\Domain\Entity;

use A3Naumov\WebApiDriveContract\Drive\DriverInterface;

class Driver implements DriverInterface
{
    public const string CODE = 'local';

    public function getCode(): string
    {
        return self::CODE;
    }
}
