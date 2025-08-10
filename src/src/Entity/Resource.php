<?php

declare(strict_types=1);

namespace App\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\ResourceInterface;
use App\Repository\ResourceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: ResourceRepository::class)]
#[ORM\Table(name: 'resource')]
class Resource implements ResourceInterface
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private ?Uuid $id;

    #[ORM\ManyToOne(inversedBy: 'resources')]
    #[ORM\JoinColumn(nullable: false)]
    private DriveInterface $drive;

    #[ORM\OneToOne(targetEntity: ResourceInterface::class, inversedBy: 'parent')]
    private ?ResourceInterface $parent = null;

    #[ORM\Column(length: 255)]
    private string $name;

    public function getId(): ?Uuid
    {
        return $this->id ?? null;
    }

    public function getDrive(): DriveInterface
    {
        return $this->drive;
    }

    public function setDrive(DriveInterface $drive): self
    {
        $this->drive = $drive;

        return $this;
    }

    public function getParent(): ?ResourceInterface
    {
        return $this->parent;
    }

    public function setParent(?ResourceInterface $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
