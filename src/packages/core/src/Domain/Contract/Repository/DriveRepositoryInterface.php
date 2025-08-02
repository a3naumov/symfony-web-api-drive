<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Contract\Repository;

use A3Naumov\WebApiDriveContract\DriveInterface;

interface DriveRepositoryInterface
{
    public function save(DriveInterface $drive): DriveInterface;
}
