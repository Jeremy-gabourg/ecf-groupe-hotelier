<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'There is already an account with this email')]
class User implements PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\Column(type: 'uuid', unique: true)]
    #[ORM\GeneratedValue(strategy: "CUSTOM")]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    private $email;

//    #[ORM\Column(type: 'json')]
//    private $roles = [];

    #[ORM\Column(type: 'string')]
    private $password;

    #[ORM\ManyToOne(targetEntity: Role::class, inversedBy: 'users' /*mappedBy: 'userRoles'*/)]
    #[ORM\JoinColumn(nullable: false)]
    private $RoleId;

    #[ORM\Column(type: 'string', length: 255)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    private $lastName;

    #[ORM\OneToOne(mappedBy: 'managerId', targetEntity: Establishment::class, cascade: ['persist', 'remove'])]
    private $establishment;

    #[ORM\OneToMany(mappedBy: 'userId', targetEntity: Reservation::class, orphanRemoval: true)]
    private $reservations;

    #[ORM\Column(type: 'string', length: 255)]
    private $userName;

    public function __construct()
    {
        $this->Roles = new ArrayCollection();
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

//    /**
//     * @return Collection|Roles[]
//     */
    public function getRoleId(): ?Role
    {
        return $this->RoleId;
    }

    public function setRoleId(?Role $RoleId): self
    {
        $this->RoleId = $RoleId;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        $this->plaintextPassword = null;
    }

//    public function addRole(Role $role): self
//    {
//        if (!$this->Roles->contains($role)) {
//            $this->Roles[] = $role;
//            $role->addUserRole($this);
//        }
//
//        return $this;
//    }

//    public function removeRole(Role $role): self
//    {
//        if ($this->Roles->removeElement($role)) {
//            $role->removeUserRole($this);
//        }
//
//        return $this;
//    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = ucfirst(strtolower($firstName));

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = strtoupper($lastName);

        return $this;
    }

    public function getEstablishment(): ?Establishment
    {
        return $this->establishment;
    }

    public function setEstablishment(?Establishment $establishment): self
    {
        // unset the owning side of the relation if necessary
        if ($establishment === null && $this->establishment !== null) {
            $this->establishment->setManagerId(null);
        }

        // set the owning side of the relation if necessary
        if ($establishment !== null && $establishment->getManagerId() !== $this) {
            $establishment->setManagerId($this);
        }

        $this->establishment = $establishment;

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
            $reservation->setUserId($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): self
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getUserId() === $this) {
                $reservation->setUserId(null);
            }
        }

        return $this;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $firstName, string $lastName): self
    {
        $this->userName = ucfirst(strtolower($firstName)).' '.strtoupper($lastName);

        return $this;
    }
}
