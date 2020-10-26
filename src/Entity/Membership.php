<?php

namespace App\Entity;

use App\Repository\MembershipRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MembershipRepository::class)
 */
class Membership
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Team::class)
     */
    private $team;


    //TODO
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="memberships")
     * @ORM\JoinColumn(nullable=false)
     */
    private $newUser;

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

    public function getUser(): ?Team
    {
        return $this->user;
    }

    public function setUser(?Team $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNewUser(): ?User
    {
        return $this->newUser;
    }

    public function setNewUser(?User $newUser): self
    {
        $this->newUser = $newUser;

        return $this;
    }
}
