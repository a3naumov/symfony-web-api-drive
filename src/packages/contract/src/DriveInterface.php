<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveContract;

interface DriveInterface
{
    public function getId(): ?int;

    public function getName(): string;
}
