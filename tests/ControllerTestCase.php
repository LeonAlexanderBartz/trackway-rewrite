<?php

namespace App\Tests;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ControllerTestCase extends WebTestCase
{
    protected ?KernelBrowser $client;
    protected ?EntityManager $entityManager;

    public function setUp() : void
    {
        parent::setUp();
        $this->client = static::createClient();
        $kernel = self::bootKernel();
        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function assertOK($status = 200)
    {
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertEquals(
            $status,
            $statusCode
        );
    }

    public function assertError($status = 500)
    {
        $statusCode = $this->client->getResponse()->getStatusCode();
        $this->assertEquals(
            $status,
            $statusCode
        );
    }

    public function assertIsJson()
    {
        $headers = $this->client->getResponse()->headers;
        $this->assertTrue(
            $headers->contains(
                'Content-Type', 'application/json'
            )
        );
    }

    protected function reseed()
    {
        fwrite(STDOUT, print_r("\e[32mResetting test database...\e[39m\n", TRUE));
        exec(sprintf(
            'php "%s/../bin/console" doctrine:database:drop --env=test --force --no-interaction',
            __DIR__
        ));
        exec(sprintf(
            'php "%s/../bin/console" doctrine:database:create --env=test --no-interaction',
            __DIR__
        ));
        exec(sprintf(
            'php "%s/../bin/console" doctrine:schema:create --env=test --no-interaction',
            __DIR__
        ));
        fwrite(STDOUT, print_r("\e[32mReseeding done.\e[39m\n", TRUE));
    }

    protected function tearDown() : void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
        $this->client = null;
    }
}
