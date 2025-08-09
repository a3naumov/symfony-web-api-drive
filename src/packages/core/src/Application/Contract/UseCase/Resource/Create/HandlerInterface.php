<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\Exception\Drive\DriveNotFoundExceptionInterface;

interface HandlerInterface
{
    /**
     * @throws DriveNotFoundExceptionInterface
     */
    public function handle(CommandInterface $command): ResourceDtoInterface;
}
