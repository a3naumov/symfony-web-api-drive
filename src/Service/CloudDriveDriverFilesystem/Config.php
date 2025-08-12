<?php

declare(strict_types=1);

namespace App\Service\CloudDriveDriverFilesystem;

use A3Naumov\CloudDriveDriverFilesystem\Infrastructure\Contract\Service\ConfigInterface;

class Config implements ConfigInterface
{
    public function __construct(
        private readonly string $rootPath,
    ) {
    }

    public function getRootPath(): string
    {
        return $this->rootPath;
    }
}
