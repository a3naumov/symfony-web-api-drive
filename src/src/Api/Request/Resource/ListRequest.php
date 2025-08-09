<?php

declare(strict_types=1);

namespace App\Api\Request\Resource;

use Symfony\Component\Validator\Constraints as Assert;

class ListRequest
{
    public function __construct(
        #[Assert\NotBlank(allowNull: true)]
        #[Assert\Length(max: 255)]
        #[Assert\When(
            expression: 'this.parent === null',
            constraints: [
                new Assert\NotBlank(message: 'Drive is required when parent is not set.'),
            ],
        )]
        public readonly ?string $drive,

        #[Assert\NotBlank(allowNull: true)]
        #[Assert\Ulid]
        #[Assert\When(
            expression: 'this.drive === null',
            constraints: [
                new Assert\NotBlank(message: 'Parent is required when drive is not set.'),
            ],
        )]
        public readonly ?string $parent,
    ) {
    }
}
