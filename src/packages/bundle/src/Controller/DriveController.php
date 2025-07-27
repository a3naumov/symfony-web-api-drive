<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveBundle\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route(path: '/api/v1/drives', name: 'a3naumov_web_api_drive_')]
class DriveController
{
    #[Route(path: '', name: 'list', methods: ['GET'])]
    public function list(): JsonResponse
    {
        return new JsonResponse(['drives' => []]);
    }
}
