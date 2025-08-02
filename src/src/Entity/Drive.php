<?php

declare(strict_types=1);

namespace App\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use App\Repository\DriveRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: DriveRepository::class)]
class Drive implements DriveInterface
{
    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: UuidType::NAME, unique: true)]
        #[ORM\GeneratedValue(strategy: 'CUSTOM')]
        #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
        private ?Uuid $id,

        #[ORM\Column(length: 255)]
        private string $name,
    ) {
    }

    public function getId(): ?\Stringable
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }
}
