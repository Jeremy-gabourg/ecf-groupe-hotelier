<?php

namespace App\Entity;

use App\Repository\TemporarySearchRepository;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TemporarySearchRepository::class)]
class TemporarySearch
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'date')]
    private $arrivalDate;

    #[ORM\Column(type: 'date')]
    /**
     * @Assert\GreaterThan(propertyPath="arrivalDate")
     * message = "La date de départ doit être plus loin que la date d'arrivée"
     */
    private $departureDate;

    #[ORM\ManyToOne(targetEntity: Establishment::class, inversedBy: 'temporarySearches')]
    #[ORM\JoinColumn(nullable: false)]
    private $establishmentId;

    #[ORM\ManyToOne(targetEntity: Suite::class)]
    private $suiteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getArrivalDate(): ?\DateTimeInterface
    {
        return $this->arrivalDate;
    }

    public function setArrivalDate(\DateTimeInterface $arrivalDate): self
    {
        $this->arrivalDate = $arrivalDate;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departureDate;
    }

    public function setDepartureDate(\DateTimeInterface $departureDate): self
    {
        $this->departureDate = $departureDate;

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

    public function getSuiteId(): ?Suite
    {
        return $this->suiteId;
    }

    public function setSuiteId(?Suite $suiteId): self
    {
        $this->suiteId = $suiteId;

        return $this;
    }
}
