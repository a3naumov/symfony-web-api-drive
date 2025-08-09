<?php

declare(strict_types=1);

namespace App\Entity;

use A3Naumov\WebApiDriveCore\Infrastructure\Contract\Entity\DriveInterface;
use App\Repository\DriveRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Types\UuidType;
use Symfony\Component\Uid\Uuid;

#[ORM\Entity(repositoryClass: DriveRepository::class)]
#[ORM\Table(name: 'drive')]
class Drive implements DriveInterface
{
    /**
     * @var Collection<int, Resource>
     */
    #[ORM\OneToMany(targetEntity: Resource::class, mappedBy: 'drive')]
    private Collection $resources;

    public function __construct(
        #[ORM\Id]
        #[ORM\Column(type: UuidType::NAME, unique: true)]
        #[ORM\GeneratedValue(strategy: 'CUSTOM')]
        #[ORM\CustomIdGenerator(class: 'doctrine.uuid_generator')]
        private ?Uuid $id,
        #[ORM\Column(length: 255)]
        private string $name
    )
    {
        $this->resources = new ArrayCollection();
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

    /**
     * @return Collection<int, Resource>
     */
    public function getResources(): Collection
    {
        return $this->resources;
    }

    public function addResource(Resource $resource): static
    {
        if (!$this->resources->contains($resource)) {
            $this->resources->add($resource);
            $resource->setDrive($this);
        }

        return $this;
    }

    public function removeResource(Resource $resource): static
    {
        if ($this->resources->removeElement($resource)) {
            // set the owning side to null (unless already changed)
            if ($resource->getDrive() === $this) {
                $resource->setDrive(null);
            }
        }

        return $this;
    }
}
