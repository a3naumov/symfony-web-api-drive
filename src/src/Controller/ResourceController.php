<?php

declare(strict_types=1);

namespace App\Controller;

use App\Api\Request\Resource\ListRequest;
use App\Api\Resource\ResourceResource;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/v1/resources', name: 'api_v1_resource_', stateless: true)]
class ResourceController
{
    #[Route(path: '', name: 'list', methods: ['GET'])]
    public function list(
        #[MapQueryString(
            validationFailedStatusCode: JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
        )] ListRequest $request,
    ): JsonResponse {
        return new JsonResponse(['resources' => [
            new ResourceResource(
                id: '01986cc1-ef93-75f8-8a9f-b119f1185ba1',
                name: 'Resource 1',
                type: 'directory',
                parent: null,
            ),
            new ResourceResource(
                id: '01986cc1-ef93-75f8-8a9f-b119f1185ba4',
                name: 'Resource 4',
                type: 'file',
                parent: null,
            ),
        ]]);
    }

    #[Route(path: '/{id}', name: 'get', methods: ['GET'])]
    public function get(): JsonResponse
    {
        return new JsonResponse(['resources' => [
            new ResourceResource(
                id: '01986cc1-ef93-75f8-8a9f-b119f1185ba4',
                name: 'Resource 4',
                type: 'file',
                parent: null,
            ),
        ]]);
    }

    #[Route(path: '', name: 'create', methods: ['POST'])]
    public function create(): JsonResponse
    {
        return new JsonResponse();
    }

    #[Route(path: '/{id}', name: 'delete', methods: ['DELETE'])]
    public function delete(): JsonResponse
    {
        return new JsonResponse();
    }

    #[Route(path: '/{id}/move', name: 'move', methods: ['PUT'])]
    public function move(): JsonResponse
    {
        return new JsonResponse();
    }

    #[Route(path: '/{id}/copy', name: 'copy', methods: ['POST'])]
    public function copy(): JsonResponse
    {
        return new JsonResponse();
    }

    #[Route(path: '/{id}/rename', name: 'rename', methods: ['PATCH'])]
    public function rename(): JsonResponse
    {
        return new JsonResponse();
    }
}
