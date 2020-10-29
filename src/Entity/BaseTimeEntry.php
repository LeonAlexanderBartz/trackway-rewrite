<?php

namespace App\Entity;

use DateInterval;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * BaseTimeEntry
 *
 * @ORM\MappedSuperclass
 */
abstract class BaseTimeEntry
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
     * @ORM\Column(name="date", type="date")
     *
     * @Assert\NotNull()
     * @Assert\Type(type="\DateTime")
     */
    protected DateTime $date;

    /**
     * @ORM\Column(name="ends_at", type="time")
     */
    protected DateTime $endsAt;

    /**
     * @ORM\Column(name="starts_at", type="time")
     */
    protected DateTime $startsAt;

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

    /**
     * @return DateTime
     */
    public function getStartDateTime(): DateTime
    {
        $return = clone $this->getDate();
        $return->setTime($this->getStartsAt()->format('H'), $this->getStartsAt()->format('i'), $this->getStartsAt()->format('s'));
        return $return;
    }

    /**
     * @return DateTime
     */
    public function getEndDateTime(): DateTime
    {
        $return = clone $this->getDate();
        $return->setTime($this->getEndsAt()->format('H'), $this->getEndsAt()->format('i'), $this->getEndsAt()->format('s'));
        return $return;
    }

    /**
     * @return DateTime
     */
    public function getDate(): DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime $date
     */
    public function setDate(DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return DateTime
     */
    public function getEndsAt(): DateTime
    {
        return $this->endsAt;
    }

    /**
     * @param DateTime $endsAt
     */
    public function setEndsAt(DateTime $endsAt): void
    {
        $this->endsAt = $endsAt;
    }

    /**
     * @return DateTime
     */
    public function getStartsAt(): DateTime
    {
        return $this->startsAt;
    }

    /**
     * @param DateTime $startsAt
     */
    public function setStartsAt(DateTime $startsAt): void
    {
        $this->startsAt = $startsAt;
    }

    /**
     * @return bool|DateInterval
     */
    public function getInterval()
    {
        return date_diff($this->getEndDateTime(), $this->getStartDateTime());
    }

    /**
     * @return int
     */
    public function getIntervalInSeconds()
    {
        return abs((new DateTime('@0'))->add($this->getInterval())->getTimestamp());
    }
}
