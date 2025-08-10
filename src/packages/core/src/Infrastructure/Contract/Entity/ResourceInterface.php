<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity;

interface ResourceInterface
{
    public function getId(): ?\Stringable;

    public function getDrive(): DriveInterface;

    public function setDrive(DriveInterface $drive): self;

    public function getParent(): ?self;

    public function setParent(?self $parent): self;

    public function getName(): string;

    public function setName(string $name): self;
}
