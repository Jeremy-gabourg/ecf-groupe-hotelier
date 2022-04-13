<?php

namespace App\Entity;

use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GalleryRepository::class)]
class Gallery
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255)]
    private $galleryName;

    #[ORM\Column(type: 'boolean')]
    private $highlightedPhoto;

    #[ORM\OneToOne(inversedBy: 'gallery', targetEntity: Suite::class, cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: true)]
    private $suiteId;

    #[ORM\OneToOne(inversedBy: 'gallery', targetEntity: Establishment::class, cascade: ['persist', 'remove'])]
    private $establishmentId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGalleryName(): ?string
    {
        return $this->galleryName;
    }

    public function setGalleryName(string $galleryName): self
    {
        $this->galleryName = $galleryName;

        return $this;
    }

    public function getHighlightedPhoto(): ?bool
    {
        return $this->highlightedPhoto;
    }

    public function setHighlightedPhoto(bool $highlightedPhoto): self
    {
        $this->highlightedPhoto = $highlightedPhoto;

        return $this;
    }

    public function getSuiteId(): ?Suite
    {
        return $this->suiteId;
    }

    public function setSuiteId(Suite $suiteId): self
    {
        $this->suiteId = $suiteId;

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
}
