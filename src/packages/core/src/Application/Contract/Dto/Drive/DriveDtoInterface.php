<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive;

interface DriveDtoInterface
{
    public function getId(): ?string;

    public function getName(): string;
}
