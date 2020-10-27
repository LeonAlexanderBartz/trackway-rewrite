<?php

namespace App\DataFixtures;

use App\Entity\Locale;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadLocales extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $en = new Locale();
        $en->setName('en');
        $manager->persist($en);

        $de = new Locale();
        $de->setName('de');
        $manager->persist($de);

        $manager->flush();
    }
}
