<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTimeEntry
 *
 * @ORM\MappedSuperclass
 */
class BaseTimeEntry
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected int $id;

    /**
     * @ORM\ManyToOne(targetEntity="Team")
     * @ORM\JoinColumn(name="team_id", referencedColumnName="id")
     */
    protected ?Team $team;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected User $user;

    /**
     * @ORM\Column(name="note", type="string", length=255)
     *
     * @Assert\NotNull()
     * @Assert\Length(max = 255)
     */
    protected string $note;

    /**
     * @ORM\Embedded(class = "DateTimeRange", columnPrefix=false)
     */
    private ?DateTimeRange $dateTimeRange;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getNote(): ?string
    {
        return $this->note;
    }

    public function setNote(string $note): self
    {
        $this->note = $note;

        return $this;
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

    public function getUser(): ?User
    {
        return $this->user;
    }


    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getDateTimeRange(): ?DateTimeRange
    {
        return $this->dateTimeRange;
    }

    public function setDateTimeRange(?DateTimeRange $dateTimeRange): self
    {
        $this->dateTimeRange = $dateTimeRange;

        return $this;
    }
}
