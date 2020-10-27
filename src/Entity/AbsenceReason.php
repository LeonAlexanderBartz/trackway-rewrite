<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AbsenceReason
 *
 * @ORM\Entity(repositoryClass="App\Repository\AbsenceReasonRepository")
 * @ORM\Table(name="absenceReasons")
 */
class AbsenceReason
{
    /**
     * @ORM\Id
     * @ORM\Column(name="id", type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected int $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(min = 1, max = 255)
     */
    private string $name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }
}
