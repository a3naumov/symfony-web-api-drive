<?php

declare(strict_types=1);

namespace App\Action\Resource;

use A3Naumov\CloudDriveCore\Application\Contract\UseCase\Resource\GetList\HandlerInterface;
use A3Naumov\CloudDriveCore\Application\UseCase\Resource\GetList\Command;
use App\Dto\Resource\ResourceDto;
use App\Mapper\Resource\DtoMapper;

class GetList
{
    public function __construct(
        private readonly HandlerInterface $getListUseCase,
        private readonly DtoMapper $mapper,
    ) {
    }

    /**
     * @return ResourceDto[]
     */
    public function handle(?string $driveId, ?string $parentId): array
    {
        $resources = $this->getListUseCase->handle(
            command: new Command(driveId: $driveId, parentId: $parentId),
        );

        return array_map(
            fn ($resource) => $this->mapper->fromApplicationDto($resource),
            $resources,
        );
    }
}
