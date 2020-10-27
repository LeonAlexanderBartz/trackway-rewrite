<?php

namespace App\DataFixtures;

use App\Entity\Group;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class LoadGroups extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $owner = new Group();
        $owner->setName('owner');
        $owner->setRoles(['ROLE_ADMIN']);
        $manager->persist($owner);

        $admin = new Group();
        $admin->setName('admin');
        $admin->setRoles(['ROLE_ADMIN']);
        $manager->persist($admin);

        $user = new Group();
        $user->setName('user');
        $user->setRoles(['ROLE_USER']);
        $manager->persist($user);

        $manager->flush();
    }
}
