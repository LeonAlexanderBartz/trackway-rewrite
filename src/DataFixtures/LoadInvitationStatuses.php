<?php

namespace App\DataFixtures;

use App\Entity\InvitationStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadInvitationStatuses extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $open = new InvitationStatus();
        $open->setName('open');
        $manager->persist($open);

        $accepted = new InvitationStatus();
        $accepted->setName('accepted');
        $manager->persist($accepted);

        $rejected = new InvitationStatus();
        $rejected->setName('rejected');
        $manager->persist($rejected);

        $manager->flush();
    }
}
