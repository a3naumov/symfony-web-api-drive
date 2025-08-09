<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource;

interface ResourceDtoInterface
{
    public function getId(): ?string;

    public function getDriveId(): string;

    public function getParentId(): ?string;

    public function getName(): string;
}
