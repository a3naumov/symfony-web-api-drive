<?php

declare(strict_types=1);

namespace App\Controller;

use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class HealthcheckController extends AbstractController
{
    #[Route(path: '/api/v1/healthcheck', name: 'api_healthcheck', methods: ['GET'])]
    #[OA\Response(
        response: 200,
        description: 'Returns the health status of the service.',
        content: new OA\JsonContent(
            properties: [
                new OA\Property(property: 'status', type: 'string', example: 'ok'),
                new OA\Property(property: 'timestamp', type: 'integer', example: 1633072800),
            ],
        ),
    )]
    public function __invoke(): JsonResponse
    {
        return new JsonResponse([
            'status' => 'ok',
            'timestamp' => (new \DateTime())->getTimestamp(),
        ]);
    }
}
