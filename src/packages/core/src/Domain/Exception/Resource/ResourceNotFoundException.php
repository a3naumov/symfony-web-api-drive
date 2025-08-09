<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Exception\Resource;

use A3Naumov\WebApiDriveContract\Exception\Resource\ResourceNotFoundExceptionInterface;

class ResourceNotFoundException extends \Exception implements ResourceNotFoundExceptionInterface
{

}
