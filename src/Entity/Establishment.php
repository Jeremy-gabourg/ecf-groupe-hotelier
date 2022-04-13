<?php

namespace App\Entity;

use App\Repository\EstablishmentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstablishmentRepository::class)]
class Establishment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $establishmentName;

    #[ORM\Column(type: 'string', length: 255)]
    private $city;

    #[ORM\Column(type: 'string', length: 255)]
    private $address;

    #[ORM\Column(type: 'text')]
    private $establishmentDescription;

    #[ORM\OneToOne(inversedBy: 'establishment', targetEntity: User::class, cascade: ['persist', 'remove'])]
    private $managerId;

    #[ORM\OneToMany(mappedBy: 'establishmentId', targetEntity: Suite::class, orphanRemoval: true)]
    private $suites;

    #[ORM\OneToMany(mappedBy: 'establishmentId', targetEntity: TemporarySearch::class)]
    private $temporarySearches;

    #[ORM\OneToOne(mappedBy: 'establishmentId', targetEntity: Gallery::class, cascade: ['persist', 'remove'])]
    private $gallery;

    public function __construct()
    {
        $this->suites = new ArrayCollection();
        $this->temporarySearches = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEstablishmentName(): ?string
    {
        return $this->establishmentName;
    }

    public function setEstablishmentName(string $establishmentName): self
    {
        $this->establishmentName = $establishmentName;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getEstablishmentDescription(): ?string
    {
        return $this->establishmentDescription;
    }

    public function setEstablishmentDescription(string $establishmentDescription): self
    {
        $this->establishmentDescription = $establishmentDescription;

        return $this;
    }

    public function getManagerId(): ?User
    {
        return $this->managerId;
    }

    public function setManagerId(?User $managerId): self
    {
        $this->managerId = $managerId;

        return $this;
    }

    /**
     * @return Collection<int, Suite>
     */
    public function getSuites(): Collection
    {
        return $this->suites;
    }

    public function addSuite(Suite $suite): self
    {
        if (!$this->suites->contains($suite)) {
            $this->suites[] = $suite;
            $suite->setEstablishmentId($this);
        }

        return $this;
    }

    public function removeSuite(Suite $suite): self
    {
        if ($this->suites->removeElement($suite)) {
            // set the owning side to null (unless already changed)
            if ($suite->getEstablishmentId() === $this) {
                $suite->setEstablishmentId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, TemporarySearch>
     */
    public function getTemporarySearches(): Collection
    {
        return $this->temporarySearches;
    }

    public function addTemporarySearch(TemporarySearch $temporarySearch): self
    {
        if (!$this->temporarySearches->contains($temporarySearch)) {
            $this->temporarySearches[] = $temporarySearch;
            $temporarySearch->setEstablishmentId($this);
        }

        return $this;
    }

    public function removeTemporarySearch(TemporarySearch $temporarySearch): self
    {
        if ($this->temporarySearches->removeElement($temporarySearch)) {
            // set the owning side to null (unless already changed)
            if ($temporarySearch->getEstablishmentId() === $this) {
                $temporarySearch->setEstablishmentId(null);
            }
        }

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        // unset the owning side of the relation if necessary
        if ($gallery === null && $this->gallery !== null) {
            $this->gallery->setEstablishmentId(null);
        }

        // set the owning side of the relation if necessary
        if ($gallery !== null && $gallery->getEstablishmentId() !== $this) {
            $gallery->setEstablishmentId($this);
        }

        $this->gallery = $gallery;

        return $this;
    }
}
