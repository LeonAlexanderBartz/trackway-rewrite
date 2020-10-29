<?php

namespace App\Tests\Controller;

use App\Entity\Absence;
use App\Entity\AbsenceReason;
use App\Entity\Locale;
use App\Entity\Team;
use App\Entity\User;
use App\Tests\ControllerTestCase;
use DateTime;

class AbsenceControllerTest extends ControllerTestCase
{

    public function testCreate()
    {
        $this->reseed();
        $this->createAbsenceReason();

        $this->client->request('POST',
            '/absence', [], [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "reason" => 1,
                "note" => "note",
                "date" => "2020-01-01 01:01:01",
                "startsAt" => "2020-01-01 01:01:01",
                "endsAt" => "2020-01-01 01:01:01",
            ]),
        );

        dump($this->client->getResponse()->getContent());

        $this->assertOK(201);
        $this->assertIsJson();

        $absence = $this->entityManager->getRepository(Absence::class)->find(1);
        $this->assertNotNull($absence);
    }

    public function testCreateWithData()
    {
        $this->reseed();
        $this->createUser();
        $this->createAbsenceReason();

        $this->client->request('POST',
            '/absence', [], [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "reason" => 1,
                "user" => 1,
                "team" => 1,
                "note" => "note",
                "date" => "2020-01-01 01:01:01",
                "startsAt" => "2020-01-01 01:01:01",
                "endsAt" => "2020-01-01 01:01:01",
            ]),
        );

        dump($this->client->getResponse()->getContent());

        $this->assertOK(201);
        $this->assertIsJson();

        $absence = $this->entityManager->getRepository(Absence::class)->find(1);
        $this->assertNotNull($absence);
    }

    public function testCreateWithNull()
    {
        $this->reseed();
        $this->createAbsenceReason();

        $this->client->request('POST',
            '/absence', [], [],
            ['CONTENT_TYPE' => 'application/json'],
        );

        $this->assertError();
        // $this->assertIsJson();

        $absence = $this->entityManager->getRepository(Absence::class)->find(1);
        $this->assertNull($absence);
    }

    public function testGet()
    {
        $this->reseed();
        $this->createAbsence();

        $this->client->request('GET', '/absence/1');

        $this->assertOK();
        $this->assertIsJson();
    }

    private function createAbsenceReason(): AbsenceReason
    {
        $reason = new AbsenceReason();
        $reason->setName('REASON');
        $this->entityManager->persist($reason);
        $this->entityManager->flush();
        return $reason;
    }

    private function createUser(): User
    {
        $user = new User();
        $user->setUsername('USERNAME');
        $user->setEmail('a@b.cd');
        $user->setEnabled(true);
        $user->setPassword('secret');
        $user->setLastLogin(new DateTime());
        $user->setConfirmationToken('1');
        $user->setRegistrationRequestedAt(new DateTime());
        $user->setPasswordRequestedAt(new DateTime());
        $user->setRoles(['ROLE1', 'ROLE2']);
        $team = $this->createTeam();
        $user->setActiveTeam($team);
        $locale = $this->createLocal();
        $user->setLocale($locale);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
        return $user;
    }

    private function createLocal(): Locale
    {
        $local = new Locale();
        $local->setName('LOCALE');
        $this->entityManager->persist($local);
        $this->entityManager->flush();
        return $local;
    }

    private function createTeam(): Team
    {
        $team = new Team();
        $team->setName('TEAM');
        $this->entityManager->persist($team);
        $this->entityManager->flush();
        return $team;
    }

    public function createAbsence() : void
    {
        $user = $this->createUser();
        $team = $user->getActiveTeam();
        $absence = new Absence();
        $absence->setNote("NOTE");
        $absence->setDate(new DateTime());
        $absence->setEndsAt(new DateTime());
        $absence->setStartsAt(new DateTime());
        $absence->setUser($user);
        $absence->setTeam($team);
        $this->entityManager->persist($absence);
        $this->entityManager->flush();
    }
}
