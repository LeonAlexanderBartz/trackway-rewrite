<?php

namespace App\Repository;

use App\Entity\DateTimeRange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DateTimeRange|null find($id, $lockMode = null, $lockVersion = null)
 * @method DateTimeRange|null findOneBy(array $criteria, array $orderBy = null)
 * @method DateTimeRange[]    findAll()
 * @method DateTimeRange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DateTimeRangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DateTimeRange::class);
    }

    // /**
    //  * @return DateTimeRange[] Returns an array of DateTimeRange objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DateTimeRange
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
