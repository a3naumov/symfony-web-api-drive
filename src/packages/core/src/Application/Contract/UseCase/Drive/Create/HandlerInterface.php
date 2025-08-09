<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;

interface HandlerInterface
{
    public function handle(CommandInterface $command): DriveDtoInterface;
}
