<?php

declare(strict_types=1);

namespace App\Controller;

use App\Action\Drive\Create;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/v1/drives', name: 'api_v1_drive_', stateless: true)]
class DriveController extends AbstractController
{
    #[Route(path: ['', '/'], name: 'create', methods: ['POST'])]
    public function create(Request $request, Create $createDrive): JsonResponse
    {
        $createDrive->handle(
            name: $request->request->get('name', 'New Drive'),
        );

        return new JsonResponse(null, JsonResponse::HTTP_NO_CONTENT);
    }
}
