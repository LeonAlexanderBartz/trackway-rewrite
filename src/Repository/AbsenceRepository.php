<?php

namespace App\Repository;

use App\Entity\Team;
use App\Entity\User;
use DateTime;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query;

/**
 * Class AbsenceRepository
 *
 * @package AppBundle\Entity\Repository
 */
class AbsenceRepository extends EntityRepository
{
    /**
     * @param Team $team
     *
     * @return mixed
     */
    public function removeByTeam(Team $team)
    {
        return $this
            ->createQueryBuilder('a')
            ->delete()
            ->where('a.team = :team')
            ->setParameter('team', $team->getId())
            ->getQuery()
            ->execute();
    }

    /**
     * @param Team $team
     * @param DateTime|null $startDate
     * @param DateTime|null $endDate
     *
     * @return array
     */
    public function findByTeam(Team $team, DateTime $startDate = null, DateTime $endDate = null)
    {
        return $this->findByTeamQuery($team, $startDate, $endDate)->getResult();
    }

    /**
     * Used for KnpPaginator.
     *
     * @param Team $team
     * @param DateTime|null $startDate
     * @param DateTime|null $endDate
     *
     * @return Query
     */
    public function findByTeamQuery(Team $team, DateTime $startDate = null, DateTime $endDate = null)
    {
        $queryBuilder =  $this
            ->createQueryBuilder('a')
            ->orderBy('a.dateTimeRange.date')
            ->orderBy('a.dateTimeRange.startsAt')
            ->where('a.team = :team')
            ->setParameter('team', $team->getId());

        if ($startDate) {
            $queryBuilder
                ->andWhere('a.dateTimeRange.date >= :startDate')
                ->setParameter('startDate', $startDate);
        }

        if ($endDate) {
            $queryBuilder
                ->andWhere('a.dateTimeRange.date <= :endDate')
                ->setParameter('endDate', $endDate);
        }

        return $queryBuilder->getQuery();
    }

    /**
     * @param Team $team
     * @param User $user
     * @param DateTime|null $startDate
     * @param DateTime|null $endDate
     *
     * @return array
     */
    public function findByTeamAndUser(Team $team, User $user, DateTime $startDate = null, DateTime $endDate = null)
    {
        return $this->findByTeamAndUserQuery($team, $user, $startDate, $endDate)->getResult();
    }

    /**
     * Used for KnpPaginator.
     *
     * @param Team $team
     * @param User $user
     * @param DateTime|null $startDate
     * @param DateTime|null $endDate
     *
     * @return Query
     */
    public function findByTeamAndUserQuery(Team $team, User $user, DateTime $startDate = null, DateTime $endDate = null)
    {
        $queryBuilder =  $this
            ->createQueryBuilder('a')
            ->orderBy('a.dateTimeRange.date')
            ->orderBy('a.dateTimeRange.startsAt')
            ->where('a.team = :team')
            ->andWhere('a.user = :user')
            ->setParameter('team', $team->getId())
            ->setParameter('user', $user->getId());

        if ($startDate) {
            $queryBuilder
                ->andWhere('a.dateTimeRange.date >= :startDate')
                ->setParameter('startDate', $startDate);
        }

        if ($endDate) {
            $queryBuilder
                ->andWhere('a.dateTimeRange.date <= :endDate')
                ->setParameter('endDate', $endDate);
        }

        return $queryBuilder->getQuery();
    }
}
