<?php

declare(strict_types=1);

namespace App\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use App\Repository\DriveRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: DriveRepository::class)]
#[ORM\Table(name: 'drive')]
class Drive implements DriveInterface
{
    #[ORM\Id]
    #[ORM\Column(type: UuidType::NAME, unique: true)]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
    private ?Uuid $id;

    #[ORM\Column(length: 10)]
    private string $driver;

    #[ORM\Column(length: 255)]
    private string $name;

    public function getId(): ?\Stringable
    {
        return $this->id ?? null;
    }

    public function getDriver(): string
    {
        return $this->driver;
    }

    public function setDriver(string $driver): static
    {
        $this->driver = $driver;

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
