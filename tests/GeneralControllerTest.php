<?php

namespace App\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GeneralControllerTest extends WebTestCase
{
    public function testIsOK()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testReturnsJson()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertTrue($client->getResponse()->headers->contains(
            'Content-Type', 'application/json'
        ));
    }

    public function testReturnsValidJson()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $content = $client->getResponse()->getContent();

        $this->assertJsonStringEqualsJsonString($content, json_encode([
            "online" => true
        ]));
    }
}
