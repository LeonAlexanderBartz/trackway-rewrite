<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $username;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastLogin;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmationToken;

    /**
     * @ORM\Column(type="datetime")
     */
    private $registrationRequestedAt;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $passwordRequestedAt;

    /**
     * @ORM\Column(type="array")
     */
    private $roles = [];

    /**
     * @ORM\ManyToOne(targetEntity=Locale::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $locale;

    /**
     * @ORM\OneToMany(targetEntity=Membership::class, mappedBy="newUser")
     */
    private $memberships;

    /**
     * @ORM\OneToMany(targetEntity=InvitationStatus::class, mappedBy="user")
     */
    private $invitations;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class, inversedBy="users")
     */
    private $activeTeam;

    public function __construct()
    {
        $this->memberships = new ArrayCollection();
        $this->invitations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
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

    public function getEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getLastLogin(): ?\DateTimeInterface
    {
        return $this->lastLogin;
    }

    public function setLastLogin(?\DateTimeInterface $lastLogin): self
    {
        $this->lastLogin = $lastLogin;

        return $this;
    }

    public function getConfirmationToken(): ?string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(string $confirmationToken): self
    {
        $this->confirmationToken = $confirmationToken;

        return $this;
    }

    public function getRegistrationRequestedAt(): ?\DateTimeInterface
    {
        return $this->registrationRequestedAt;
    }

    public function setRegistrationRequestedAt(\DateTimeInterface $registrationRequestedAt): self
    {
        $this->registrationRequestedAt = $registrationRequestedAt;

        return $this;
    }

    public function getPasswordRequestedAt(): ?\DateTimeInterface
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(?\DateTimeInterface $passwordRequestedAt): self
    {
        $this->passwordRequestedAt = $passwordRequestedAt;

        return $this;
    }

    public function getRoles(): ?array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    public function getLocale(): ?Locale
    {
        return $this->locale;
    }

    public function setLocale(?Locale $locale): self
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return Collection|Membership[]
     */
    public function getMemberships(): Collection
    {
        return $this->memberships;
    }

    public function addMembership(Membership $membership): self
    {
        if (!$this->memberships->contains($membership)) {
            $this->memberships[] = $membership;
            $membership->setNewUser($this);
        }

        return $this;
    }

    public function removeMembership(Membership $membership): self
    {
        if ($this->memberships->removeElement($membership)) {
            // set the owning side to null (unless already changed)
            if ($membership->getNewUser() === $this) {
                $membership->setNewUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|InvitationStatus[]
     */
    public function getInvitations(): Collection
    {
        return $this->invitations;
    }

    public function addInvitation(InvitationStatus $invitation): self
    {
        if (!$this->invitations->contains($invitation)) {
            $this->invitations[] = $invitation;
            $invitation->setUser($this);
        }

        return $this;
    }

    public function removeInvitation(InvitationStatus $invitation): self
    {
        if ($this->invitations->removeElement($invitation)) {
            // set the owning side to null (unless already changed)
            if ($invitation->getUser() === $this) {
                $invitation->setUser(null);
            }
        }

        return $this;
    }

    public function getActiveTeam(): ?Team
    {
        return $this->activeTeam;
    }

    public function setActiveTeam(?Team $activeTeam): self
    {
        $this->activeTeam = $activeTeam;

        return $this;
    }
}
