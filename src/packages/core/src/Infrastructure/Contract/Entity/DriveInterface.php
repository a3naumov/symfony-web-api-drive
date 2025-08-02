<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity;

interface DriveInterface
{
    public function getId(): ?int;

    public function getName(): ?string;

    public function setName(string $name): static;
}
