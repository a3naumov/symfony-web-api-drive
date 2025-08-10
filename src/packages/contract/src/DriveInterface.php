<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveContract;

use A3Naumov\WebApiDriveContract\Exception\Resource\ResourceNotFoundExceptionInterface;

interface DriveInterface
{
    public function getId(): ?string;

    public function getDriver(): DriverInterface;

    public function getName(): string;

    public function setName(string $name): static;

    /**
     * @throws ResourceNotFoundExceptionInterface
     */
    public function addResource(ResourceInterface $resource): static;
}
