<?php

declare(strict_types=1);

namespace App\Controller;

use App\Action\Drive\Create;
use App\Action\Drive\Delete;
use App\Api\Request\Drive\CreateRequest;
use App\Api\Resource\DriveResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Uid\Uuid;

#[Route(path: '/api/v1/drives', name: 'api_v1_drive_', stateless: true)]
class DriveController
{
    #[Route(path: '', name: 'create', methods: ['POST'])]
    public function create(
        #[MapRequestPayload] CreateRequest $request,
        Create $createDrive,
    ): JsonResponse {
        $createDrive->handle(
            name: $request->name,
        );

        return new JsonResponse(['drives' => [new DriveResource(
            id: Uuid::v4(),
            name: $request->name,
        )]], JsonResponse::HTTP_CREATED);
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
