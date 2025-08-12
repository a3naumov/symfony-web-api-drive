<?php

declare(strict_types=1);

namespace App\Action\Resource;

use A3Naumov\CloudDriveCore\Application\Contract\UseCase\Resource\GetById\HandlerInterface;
use A3Naumov\CloudDriveCore\Application\UseCase\Resource\GetById\Command;
use App\Dto\Resource\ResourceDto;
use App\Mapper\Resource\DtoMapper;

class GetById
{
    public function __construct(
        private readonly HandlerInterface $getByIdUseCase,
        private readonly DtoMapper $mapper,
    ) {
    }

    public function handle(string $id): ?ResourceDto
    {
        $resource = $this->getByIdUseCase->handle(new Command($id));

        return $resource ? $this->mapper->fromApplicationDto($resource) : null;
    }
}
