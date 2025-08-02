<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Repository;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;

interface DriveRepositoryInterface
{
    public function save(DriveInterface $drive): void;
}
