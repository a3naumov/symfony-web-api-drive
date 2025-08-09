<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity;

interface ResourceInterface
{
    public function getId(): ?\Stringable;
}
