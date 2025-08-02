<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create;

interface CommandInterface
{
    public function getName(): string;
}
