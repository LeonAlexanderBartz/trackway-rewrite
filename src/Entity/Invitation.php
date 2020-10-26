<?php

namespace App\Entity;

use App\Repository\InvitationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InvitationRepository::class)
 */
class Invitation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $team;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    //TODO: User
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $confirmationToken;

    /**
     * @ORM\ManyToOne(targetEntity=InvitationStatus::class)
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTeam(): ?Team
    {
        return $this->team;
    }

    public function setTeam(?Team $team): self
    {
        $this->team = $team;

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

    public function getUser(): ?AbsenceReason
    {
        return $this->user;
    }

    public function setUser(?AbsenceReason $user): self
    {
        $this->user = $user;

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

    public function getStatus(): ?InvitationStatus
    {
        return $this->status;
    }

    public function setStatus(?InvitationStatus $status): self
    {
        $this->status = $status;

        return $this;
    }
}
