<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 *
 * @ORM\Table(name="invitations")
 * @ORM\Entity(repositoryClass="App\Repository\InvitationRepository")
 */
class Invitation
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected int $id;

    /**
     * @ORM\ManyToOne(targetEntity="Team", inversedBy="invitations")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected ?Team $team;

    /**
     * @ORM\Column(name="email", type="string")
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Email()
     * @Assert\Length(max = 255)
     */
    protected string $email;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="invitations")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected ?User $user;

    /**
     * @ORM\Column(name="confirmation_token", type="string", length=255, nullable=true)
     */
    protected string $confirmationToken;

    /**
     * @ORM\ManyToOne(targetEntity="InvitationStatus")
     * @ORM\JoinColumn(name="status_id", referencedColumnName="id")
     */
    protected ?InvitationStatus $status;

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

    public function getUser(): User
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
