<?php

namespace App\Repository;

use App\Entity\InvitationStatus;
use Doctrine\ORM\EntityRepository;

/**
 * Class InvitationStatusRepository
 *
 * @package AppBundle\Entity\Repository
 */
class InvitationStatusRepository extends EntityRepository
{
    /**
     * @param $name
     *
     * @return null|InvitationStatus
     */
    public function findOneByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}
