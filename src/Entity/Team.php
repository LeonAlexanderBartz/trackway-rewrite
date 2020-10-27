<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Team
 *
 * @ORM\Table(name="teams")
 * @ORM\Entity(repositoryClass="App\Repository\TeamRepository")
 */
class Team
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private int $id;

    /**
     * @ORM\Column(name="name", type="string", length=255)
     *
     * @Assert\NotBlank()
     * @Assert\Type(type="string")
     * @Assert\Length(min = 1, max = 255)
     */
    private string $name;

    /**
     * @ORM\OneToMany(targetEntity="Membership", mappedBy="team", cascade={"remove"})
     */
    private ArrayCollection $memberships;

    /**
     * @ORM\OneToMany(targetEntity="Invitation", mappedBy="team", cascade={"remove"})
     */
    protected ArrayCollection $invitations;

    /**
     * @ORM\OneToMany(targetEntity="Project", mappedBy="team", cascade={"remove"})
     */
    private ArrayCollection $projects;

    public function __construct()
    {
        $this->memberships = new ArrayCollection();
        $this->invitations = new ArrayCollection();
        $this->projects = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return ArrayCollection
     */
    public function getMemberships()
    {
        return $this->memberships;
    }

    /**
     * @param ArrayCollection $memberships
     */
    public function setMemberships(ArrayCollection $memberships)
    {
        $this->memberships = $memberships;
    }

    /**
     * @return ArrayCollection
     */
    public function getInvitations()
    {
        return $this->invitations;
    }

    /**
     * @param ArrayCollection $invitations
     */
    public function setInvitations(ArrayCollection $invitations)
    {
        $this->invitations = $invitations;
    }

    /**
     * @return ArrayCollection
     */
    public function getProjects()
    {
        return $this->projects;
    }

    /**
     * @param ArrayCollection $projects
     */
    public function setProjects(ArrayCollection $projects)
    {
        $this->projects = $projects;
    }
}
