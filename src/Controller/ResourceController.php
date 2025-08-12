<?php

declare(strict_types=1);

namespace App\Controller;

use App\Action\Resource\Create;
use App\Action\Resource\GetById;
use App\Action\Resource\GetList;
use App\Api\Request\Resource\CreateRequest;
use App\Api\Request\Resource\ListRequest;
use App\Dto\Resource\ResourceDto;
use App\Mapper\Resource\DtoMapper;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Attribute\MapQueryString;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/v1/resources', name: 'api_v1_resource_', stateless: true)]
class ResourceController
{
    #[Route(path: '', name: 'list', methods: ['GET'])]
    public function list(
        #[MapQueryString(
            validationFailedStatusCode: JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
        )] ListRequest $request,
        GetList $getList,
        DtoMapper $mapper,
    ): JsonResponse {
        $resourcesDto = $getList->handle(
            driveId: $request->drive,
            parentId: $request->parent,
        );

        return new JsonResponse([
            'resources' => array_map(
                static fn (ResourceDto $resource) => $mapper->toApiResource($resource),
                $resourcesDto,
            ),
        ]);
    }

    #[Route(path: '/{id}', name: 'get', methods: ['GET'])]
    public function get(
        string $id,
        GetById $getById,
        DtoMapper $mapper,
    ): JsonResponse {
        $resourceDto = $getById->handle($id);

        if (!$resourceDto) {
            throw new NotFoundHttpException(message: 'Resource not found');
        }

        return new JsonResponse([
            'resources' => [$mapper->toApiResource($resourceDto)],
        ]);
    }

    #[Route(path: '', name: 'create', methods: ['POST'])]
    public function create(
        #[MapRequestPayload] CreateRequest $request,
        Create $createResource,
        DtoMapper $mapper,
    ): JsonResponse {
        $resourceDto = $createResource->handle($mapper->fromCreateRequest($request));

        return new JsonResponse([
            'resources' => [$mapper->toApiResource($resourceDto)],
        ]);
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
