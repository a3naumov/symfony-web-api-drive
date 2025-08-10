<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetById;

interface CommandInterface
{
    public function getId(): string;
}
