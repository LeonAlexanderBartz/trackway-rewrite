<?php

namespace App\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * Class AbsenceReasonRepository
 *
 * @package AppBundle\Entity\Repository
 */
class BaseTimeEntryRepository extends EntityRepository
{
    public function findOneByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}
