<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto;

interface DriveDtoInterface
{
    public function getId(): ?string;

    public function getName(): string;
}
