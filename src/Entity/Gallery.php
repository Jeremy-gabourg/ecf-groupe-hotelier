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
    #[ORM\JoinColumn(nullable: false)]
    private $suiteId;

    #[ORM\OneToMany(mappedBy: 'gallery', targetEntity: Media::class)]
    private $mediaId;

    public function __construct()
    {
        $this->mediaId = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Media>
     */
    public function getMediaId(): Collection
    {
        return $this->mediaId;
    }

    public function addMediaId(Media $mediaId): self
    {
        if (!$this->mediaId->contains($mediaId)) {
            $this->mediaId[] = $mediaId;
            $mediaId->setGallery($this);
        }

        return $this;
    }

    public function removeMediaId(Media $mediaId): self
    {
        if ($this->mediaId->removeElement($mediaId)) {
            // set the owning side to null (unless already changed)
            if ($mediaId->getGallery() === $this) {
                $mediaId->setGallery(null);
            }
        }

        return $this;
    }
}
