<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Application\Exception\Drive;

use A3Naumov\WebApiDriveCore\Application\Contract\Exception\Drive\InvalidDriverExceptionInterface;

class InvalidDriverException extends \Exception implements InvalidDriverExceptionInterface
{
}
