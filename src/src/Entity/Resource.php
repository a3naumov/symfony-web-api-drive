<?php

declare(strict_types=1);

namespace App\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use App\Repository\ResourceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ResourceRepository::class)]
#[ORM\Table(name: 'resource')]
class Resource implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id;

    #[ORM\ManyToOne(inversedBy: 'resources')]
    #[ORM\JoinColumn(nullable: false)]
    private Drive $drive;

    #[ORM\OneToOne(targetEntity: self::class, inversedBy: 'parent')]
    private ?self $parent = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    public function getId(): ?Uuid
    {
        return $this->id ?? null;
    }

    public function getDrive(): Drive
    {
        return $this->drive;
    }

    public function setDrive(Drive $drive): static
    {
        $this->drive = $drive;

        return $this;
    }

    public function getParent(): ?static
    {
        return $this->parent;
    }

    public function setParent(?self $parent): static
    {
        $this->parent = $parent;

        return $this;
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
