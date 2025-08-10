<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetList;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;

interface HandlerInterface
{
    /**
     * @return ResourceDtoInterface[]
     */
    public function handle(CommandInterface $command): array;
}
