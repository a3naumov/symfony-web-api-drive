<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Delete;

interface HandlerInterface
{
    public function handle(CommandInterface $command): void;
}
