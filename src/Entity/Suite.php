<?php

namespace App\Entity;

use App\Repository\SuiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SuiteRepository::class)]
class Suite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $title;

    #[ORM\Column(type: 'float')]
    private $price;

    #[ORM\Column(type: 'text')]
    private $suiteDescription;

    #[ORM\Column(type: 'string', length: 255)]
    private $link;

    #[ORM\ManyToOne(targetEntity: Establishment::class, inversedBy: 'suites')]
    #[ORM\JoinColumn(nullable: false)]
    private $establishmentId;

    #[ORM\OneToOne(mappedBy: 'suiteId', targetEntity: Gallery::class, cascade: ['persist', 'remove'])]
    private $gallery;

    #[ORM\OneToMany(mappedBy: 'suiteId', targetEntity: Reservation::class, orphanRemoval: true)]
    private $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getSuiteDescription(): ?string
    {
        return $this->suiteDescription;
    }

    public function setSuiteDescription(string $suiteDescription): self
    {
        $this->suiteDescription = $suiteDescription;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getEstablishmentId(): ?Establishment
    {
        return $this->establishmentId;
    }

    public function setEstablishmentId(?Establishment $establishmentId): self
    {
        $this->establishmentId = $establishmentId;

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(Gallery $gallery): self
    {
        // set the owning side of the relation if necessary
        if ($gallery->getSuiteId() !== $this) {
            $gallery->setSuiteId($this);
        }

        $this->gallery = $gallery;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): self
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations[] = $reservation;
            $reservation->setSuiteId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getSuiteId() === $this) {
                $reservation->setSuiteId(null);
            }
        }

        return $this;
    }
}
