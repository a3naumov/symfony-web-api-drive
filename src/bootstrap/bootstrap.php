<?php

declare(strict_types=1);

require_once dirname(__DIR__).'/vendor/autoload.php';

$appHandler = require $_SERVER['SCRIPT_FILENAME'];

$runtime = new Symfony\Component\Runtime\SymfonyRuntime(options: [
    'project_dir' => dirname(__DIR__),
]);

[$app, $args] = $runtime
    ->getResolver(callable: $appHandler)
    ->resolve();

exit($runtime->getRunner(application: $app(...$args))->run());
