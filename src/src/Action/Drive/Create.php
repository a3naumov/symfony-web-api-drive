<?php

declare(strict_types=1);

namespace App\Action\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\UseCase\Drive\Create\HandlerInterface;
use A3Naumov\WebApiDriveCore\Application\UseCase\Drive\Create\Command;
use App\Dto\Drive\DriveDto;
use App\Mapper\Drive\DtoMapper;

class Create
{
    public function __construct(
        private readonly HandlerInterface $createDriveUseCase,
        private readonly DtoMapper $dtoMapper,
    ) {
    }

    public function handle(DriveDto $driveDto): DriveDto
    {
        $command = new Command(
            name: $driveDto->name,
            driver: $driveDto->driver,
        );

        $drive = $this->createDriveUseCase->handle($command);

        return $this->dtoMapper->fromApplicationDto($drive);
    }
}
