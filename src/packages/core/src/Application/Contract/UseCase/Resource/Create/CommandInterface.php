<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create;

interface CommandInterface
{
    public function getDriveId(): string;

    public function getParentId(): ?string;

    public function getName(): string;
}
