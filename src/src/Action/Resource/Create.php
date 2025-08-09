<?php

declare(strict_types=1);

namespace App\Action\Resource;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Resource\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\UseCase\Resource\Create\Command;
use App\Api\Request\Resource\CreateRequest;
use App\Dto\Resource\ResourceDto;
use App\Mapper\Resource\DtoMapper;

class Create
{
    public function __construct(
        private readonly HandlerInterface $createResourceUseCase,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function handle(CreateRequest $request): ResourceDto
    {
        $command = new Command(
            driveId: $request->drive,
            parentId: $request->parent,
            name: $request->name,
        );

        $resource = $this->createResourceUseCase->handle($command);

        return $this->mapper->fromApplicationDto($resource);
    }
}
