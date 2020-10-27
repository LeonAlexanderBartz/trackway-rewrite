<?php

namespace App\Entity;

use DateInterval;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Embeddable
 */
class DateTimeRange
{
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
