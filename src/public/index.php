<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/bootstrap/bootstrap.php';

return static fn (array $context) => new \App\Kernel(
    environment: $context['APP_ENV'],
    debug: (bool) $context['APP_DEBUG'],
);
