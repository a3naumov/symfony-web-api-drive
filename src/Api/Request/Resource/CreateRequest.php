<?php

declare(strict_types=1);

namespace App\Api\Request\Resource;

use Symfony\Component\Validator\Constraints as Assert;

class CreateRequest
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Uuid]
        public readonly string $drive,

        #[Assert\NotBlank(allowNull: true)]
        #[Assert\Uuid]
        public readonly ?string $parent,

        #[Assert\NotBlank]
        #[Assert\Length(max: 255)]
        public readonly string $name,
    ) {
    }
}
