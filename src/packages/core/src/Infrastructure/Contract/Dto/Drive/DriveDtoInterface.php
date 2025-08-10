<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Drive;

interface DriveDtoInterface
{
    public function getId(): ?string;

    public function getDriver(): string;

    public function getName(): string;
}
