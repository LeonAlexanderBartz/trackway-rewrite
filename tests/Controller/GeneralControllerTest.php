<?php

namespace App\Tests\Controller;

use App\Tests\ControllerTestCase;

class GeneralControllerTest extends ControllerTestCase
{
    public function testIsOK()
    {
        $this->client->request('GET', '/');

        $this->assertOK();
    }

    public function testReturnsJson()
    {
        $this->client->request('GET', '/');

        $this->assertIsJson();
    }

    public function testReturnsValidJson()
    {
        $this->client->request('GET', '/');

        $content = $this->client->getResponse()->getContent();

        $this->assertJsonStringEqualsJsonString($content, json_encode([
            "success" => true,
            "data" => [
                "online" => true
            ]
        ]));
    }
}
