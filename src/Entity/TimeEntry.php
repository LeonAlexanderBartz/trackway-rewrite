<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TimeEntry
 *
 * @ORM\Table(name="time_entries")
 * @ORM\Entity(repositoryClass="App\Repository\TimeEntryRepository")
 */
class TimeEntry extends BaseTimeEntry
{
    /**
     * @ORM\ManyToOne(targetEntity="Project")
     * @ORM\JoinColumn(name="project_id", referencedColumnName="id")
     */
    protected ?Project $project;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): self
    {
        $this->project = $project;

        return $this;
    }
}
