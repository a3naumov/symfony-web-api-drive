<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Infrastructure\Contract\Factory\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;

interface ResourceFactoryInterface
{
    public function create(ResourceDtoInterface $resourceDto): ResourceInterface;
}
