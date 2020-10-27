<?php

namespace App\DataFixtures;

use App\Entity\AbsenceReason;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadAbsenceReasons extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $illness = new AbsenceReason();
        $illness->setName('illness');
        $manager->persist($illness);

        $vacation = new AbsenceReason();
        $vacation->setName('vacation');
        $manager->persist($vacation);

        $holiday = new AbsenceReason();
        $holiday->setName('holiday');
        $manager->persist($holiday);

        $manager->flush();

        $manager->flush();
    }
}
