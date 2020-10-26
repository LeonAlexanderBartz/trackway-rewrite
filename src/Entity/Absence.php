<?php

namespace App\Entity;

use App\Repository\AbsenceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AbsenceRepository::class)
 */
class Absence extends BaseTimeEntry
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=AbsenceReason::class, inversedBy="absences")
     * @ORM\JoinColumn(nullable=false)
     */
    private $reason;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getReason(): ?AbsenceReason
    {
        return $this->reason;
    }

    public function setReason(?AbsenceReason $reason): self
    {
        $this->reason = $reason;

        return $this;
    }
}
