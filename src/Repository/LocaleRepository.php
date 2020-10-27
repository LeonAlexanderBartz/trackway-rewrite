<?php

namespace App\Repository;

use App\Entity\Locale;
use Doctrine\ORM\EntityRepository;

/**
 * Class LocaleRepository
 *
 * @package AppBundle\Entity\Repository
 */
class LocaleRepository extends EntityRepository
{
    /**
     * @param $name
     *
     * @return null|Locale
     */
    public function findOneByName($name)
    {
        return $this->findOneBy(['name' => $name]);
    }
}
