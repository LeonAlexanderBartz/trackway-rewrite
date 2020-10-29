<?php

namespace App\Tests\Controller;

use App\Entity\Absence;
use App\Entity\AbsenceReason;
use App\Tests\ControllerTestCase;
use DateTime;

class AbsenceControllerTest extends ControllerTestCase
{

    public function testCreate()
    {
        $this->reseed();
        $this->client->request('POST',
            '/absence/new', [], [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "reason" => 1,
                "note" => "note",
                "date" => "01.01.2020 01:01",
                "startsAt" => "02.01.2020 02:01",
                "endsAt" => "03.01.2020 03:01",
            ]),
        );

        $this->assertOK();
        $this->assertIsJson();

        $id = $this->getIdFromResponse();
        $absence = $this->entityManager->getRepository(Absence::class)->find($id);
        $this->assertNotNull($absence);
    }

    public function testCreateWithData()
    {
        $this->reseed();
        $reason = new AbsenceReason();
        $reason->setName('REASON');
        $this->entityManager->persist($reason);
        $this->entityManager->flush();

        $this->client->request('POST',
            '/absence/new', [], [],
            ['CONTENT_TYPE' => 'application/json'],
            json_encode([
                "reason" => 1,
                "note" => "note",
                "date" => "01.01.2020 00:00:00",
                "startsAt" => "02.01.2020 02:01:01",
                "endsAt" => "03.01.2020 03:01:01",
            ]),
        );

        $this->assertOK();
        $this->assertIsJson();

        $id = $this->getIdFromResponse();
        $absence = $this->entityManager->getRepository(Absence::class)->find($id);
        $this->assertNotNull($absence);
        $this->assertSame(1, $absence->getReason()->getId());
        $this->assertSame("note", $absence->getNote());
        $this->assertSame("01.01.2020 00:00:00", $absence->getDate()->format('d.m.Y H:i:s'));
    }

    public function testCreateWithNull()
    {
        $this->reseed();
        $reason = new AbsenceReason();
        $reason->setName('REASON');
        $this->entityManager->persist($reason);
        $this->entityManager->flush();

        $this->client->request('POST',
            '/absence/new', [], [],
            ['CONTENT_TYPE' => 'application/json'],
            '{"reason":null}'
        );

        $this->assertOK();
        $this->assertIsJson();

        $id = $this->getIdFromResponse();
        $absence = $this->entityManager->getRepository(Absence::class)->find($id);
        $this->assertNotNull($absence);
        $this->assertNull($absence->getReason());
    }

    private function getIdFromResponse(): int
    {
        $response = json_decode($this->client->getResponse()->getContent());
        return $response->data->id;
    }

    public function testGet()
    {
        $this->reseed();
        $absence = new Absence();
        $absence->setNote("");
        $absence->setDate(new DateTime());
        $absence->setEndsAt(new DateTime());
        $absence->setStartsAt(new DateTime());
        $this->entityManager->persist($absence);
        $this->entityManager->flush();

        $this->client->request('GET', '/absence/1');

        $this->assertOK();
        $this->assertIsJson();
    }
}
