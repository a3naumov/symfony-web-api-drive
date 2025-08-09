<?php

declare(strict_types=1);

namespace App\Action\Resource;

use App\Api\Request\Resource\ListRequest;

class GetList
{
    public function handle(ListRequest $request): array
    {
        return [];
    }
}
