<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Drive\DriveDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\Exception\Drive\InvalidDriverExceptionInterface;

interface HandlerInterface
{
    /**
     * @throws InvalidDriverExceptionInterface
     */
    public function handle(CommandInterface $command): DriveDtoInterface;
}
