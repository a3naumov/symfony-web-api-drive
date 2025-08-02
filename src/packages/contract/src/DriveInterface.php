<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveContract;

interface DriveInterface
{
    public function getId(): ?\Stringable;

    public function getName(): string;
}
