<?php

namespace App\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 *
 * @UniqueEntity(fields={"email"}, groups={"profile", "registration"})
 * @UniqueEntity(fields={"username"}, groups={"profile", "registration"})
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected ?int $id;

    /**
     * @ORM\Column(name="username", type="string", length=255, unique=true)
     *
     * @Assert\NotBlank(groups={"profile", "registration"})
     * @Assert\Length(min=3, groups={"profile", "registration"})
     */
    protected string $username;

    /**
     * @ORM\Column(name="email", type="string", length=255, unique=true)
     *
     * @Assert\Email(groups={"profile", "registration", "resetting"})
     */
    protected ?string $email;

    /**
     * @ORM\Column(name="enabled ", type="boolean")
     */
    protected ?bool $enabled;

    /**
     * @ORM\Column(name="password", type="string", length=255)
     *
     * @Assert\NotBlank(groups={"change_password", "registration"})
     * @Assert\Length(min=3, groups={"change_password", "registration"})
     */
    protected ?string $password;

    /**
     * @ORM\Column(name="last_login", type="datetime", nullable=true)
     */
    protected ?DateTime $lastLogin;

    /**
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    protected ?string $confirmationToken;

    /**
     * @ORM\Column(name="registration_requested_at", type="datetime", nullable=true)
     */
    protected ?DateTime $registrationRequestedAt;

    /**
     * @ORM\Column(name="password_requested_at", type="datetime", nullable=true)
     */
    protected ?DateTime $passwordRequestedAt;

    /**
     * @ORM\Column(name="roles", type="array")
     */
    protected ?array $roles;

    /**
     * @ORM\ManyToOne(targetEntity="Locale")
     * @ORM\JoinColumn(name="locale_id", referencedColumnName="id")
     *
     * @Assert\NotNull()
     * @Assert\Type(type="App\Entity\Locale")
     */
    protected Locale $locale;

    /**
     * @ORM\OneToMany(targetEntity="Membership", mappedBy="user")
     */
    protected ArrayCollection $memberships;

    /**
     * @ORM\OneToMany(targetEntity="Invitation", mappedBy="user")
     */
    protected ArrayCollection $invitations;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="activeTeam_id", referencedColumnName="id")
     */
    protected ?Team $activeTeam;

    public function __construct()
    {
        $this->roles = [];
        $this->memberships = new ArrayCollection();
        $this->invitations = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->username;
    }

    public function eraseCredentials()
    {
    }

    public function isAccountNonExpired()
    {
        return true;
    }

    public function isAccountNonLocked()
    {
        return true;
    }

    public function isCredentialsNonExpired()
    {
        return true;
    }

    public function isEnabled()
    {
        return $this->enabled;
    }

    public function serialize(): string
    {
        return serialize([$this->id, $this->username, $this->password, $this->locale]);
    }

    public function unserialize(string $serialized): void
    {
        list ($this->id, $this->username, $this->password, $this->locale) = unserialize($serialized);
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setEnabled(bool $enabled): void
    {
        $this->enabled = $enabled;
    }

    public function getSalt()
    {
        return null;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getLastLogin(): DateTime
    {
        return $this->lastLogin;
    }

    public function setLastLogin(DateTime $lastLogin): void
    {
        $this->lastLogin = $lastLogin;
    }

    public function getConfirmationToken(): string
    {
        return $this->confirmationToken;
    }

    public function setConfirmationToken(string$confirmationToken): void
    {
        $this->confirmationToken = $confirmationToken;
    }

    public function getRegistrationRequestedAt(): DateTime
    {
        return $this->registrationRequestedAt;
    }

    public function setRegistrationRequestedAt(DateTime $registrationRequestedAt): void
    {
        $this->registrationRequestedAt = $registrationRequestedAt;
    }

    public function getPasswordRequestedAt(): DateTime
    {
        return $this->passwordRequestedAt;
    }

    public function setPasswordRequestedAt(DateTime $passwordRequestedAt)
    {
        $this->passwordRequestedAt = $passwordRequestedAt;
    }

    public function getRoles(): array
    {
        return $this->roles;
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }


    public function getLocale(): Locale
    {
        return $this->locale;
    }

    public function setLocale(Locale $locale): void
    {
        $this->locale = $locale;
    }

    public function getMemberships(): ArrayCollection
    {
        return $this->memberships;
    }

    public function setMemberships(ArrayCollection$memberships): void
    {
        $this->memberships = $memberships;
    }

    public function getInvitations(): ArrayCollection
    {
        return $this->invitations;
    }

    public function setInvitations(ArrayCollection$invitations): void
    {
        $this->invitations = $invitations;
    }

    public function getActiveTeam(): Team
    {
        return $this->activeTeam;
    }

    public function setActiveTeam(Team $activeTeam): void
    {
        $this->activeTeam = $activeTeam;
    }
}
