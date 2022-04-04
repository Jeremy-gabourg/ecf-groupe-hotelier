<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'datetime')]
    private $doneOn;

    #[ORM\Column(type: 'date')]
    private $dateStart;

    #[ORM\Column(type: 'date')]
    private $dateEnd;

    #[ORM\Column(type: 'string', length: 255)]
    private $state;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $userId;

    #[ORM\ManyToOne(targetEntity: Suite::class, inversedBy: 'reservations')]
    #[ORM\JoinColumn(nullable: false)]
    private $suiteId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDoneOn(): ?\DateTimeInterface
    {
        return $this->doneOn;
    }

    public function setDoneOn(\DateTimeInterface $doneOn): self
    {
        $this->doneOn = $doneOn;

        return $this;
    }

    public function getDateStart(): ?\DateTimeInterface
    {
        return $this->dateStart;
    }

    public function setDateStart(\DateTimeInterface $dateStart): self
    {
        $this->dateStart = $dateStart;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->userId;
    }

    public function setUserId(?User $userId): self
    {
        $this->userId = $userId;

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
