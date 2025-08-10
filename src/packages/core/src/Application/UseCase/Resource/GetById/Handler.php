<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\UseCase\Resource\GetById;

use A3Naumov\WebApiDriveCore\Application\Contract\Dto\Resource\ResourceDtoInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetById\CommandInterface;
use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\GetById\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\Mapper\Resource\ResourceMapper;
use A3Naumov\WebApiDriveCore\Domain\Contract\Repository\ResourceRepositoryInterface;

class Handler implements HandlerInterface
{
    public function __construct(
        private readonly ResourceRepositoryInterface $resourceRepository,
        private readonly ResourceMapper $resourceMapper,
    ) {
    }

    public function handle(CommandInterface $command): ?ResourceDtoInterface
    {
        $resource = $this->resourceRepository->findById($command->getId());

        return $resource
            ? $this->resourceMapper->fromDomain($resource)
            : null;
    }
}
