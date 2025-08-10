<?php

declare(strict_types=1);

namespace App\Controller;

use App\Action\Drive\Create;
use App\Action\Drive\Delete;
use App\Api\Request\Drive\CreateRequest;
use App\Mapper\Drive\DtoMapper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/v1/drives', name: 'api_v1_drive_', stateless: true)]
class DriveController
{
    #[Route(path: '', name: 'create', methods: ['POST'])]
    public function create(
        #[MapRequestPayload] CreateRequest $request,
        Create $createDrive,
        DtoMapper $mapper,
    ): JsonResponse {
        $drive = $createDrive->handle(
            driveDto: $mapper->fromCreateRequest($request),
        );

        return new JsonResponse(['drives' => [$mapper->toApiResource($drive)]], JsonResponse::HTTP_CREATED);
    }

    #[Route(path: '/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(
        string $id,
        Delete $deleteDrive,
    ): JsonResponse {
        $deleteDrive->handle(id: $id);

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
