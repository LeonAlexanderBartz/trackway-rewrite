<?php

namespace App\Entity;

use App\Repository\BaseTimeEntryRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BaseTimeEntryRepository::class)
 */
class BaseTimeEntry
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $note;

    /**
     * @ORM\OneToOne(targetEntity=DateTimeRange::class, cascade={"persist", "remove"})
     */
    private $dateTimeRange;

    public function getId(): ?int
    {
        return $this->id;
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
