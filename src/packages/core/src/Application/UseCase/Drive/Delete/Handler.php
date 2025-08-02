<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Delete;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete\HandlerInterface;

class Handler implements HandlerInterface
{
    public function handle(CommandInterface $command): void
    {
        return;
    }
}
