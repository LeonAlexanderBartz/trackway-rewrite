<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Absence
 *
 * @ORM\Table(name="absences")
 * @ORM\Entity(repositoryClass="App\Repository\AbsenceRepository")
 */
class Absence extends BaseTimeEntry
{

    /**
     * @ORM\ManyToOne(targetEntity="AbsenceReason")
     * @ORM\JoinColumn(name="reason_id", referencedColumnName="id")
     *
     * @Assert\NotNull()
     * @Assert\Type(type="App\Entity\AbsenceReason")
     */
    protected ?AbsenceReason $reason;

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
