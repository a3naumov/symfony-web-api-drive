<?php

declare(strict_types=1);

namespace App\Api\Request\Drive;

use Symfony\Component\Validator\Constraints as Assert;

class CreateRequest
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Length(max: 255)]
        public readonly string $name,
    ) {
    }
}
