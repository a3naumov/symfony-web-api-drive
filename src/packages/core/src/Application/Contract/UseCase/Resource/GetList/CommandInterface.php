<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetList;

interface CommandInterface
{
    public function getDriveId(): ?string;

    public function getParentId(): ?string;
}
