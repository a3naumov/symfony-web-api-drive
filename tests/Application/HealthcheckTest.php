<?php

declare(strict_types=1);

namespace App\Tests\Application;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HealthcheckTest extends WebTestCase
{
    public function testHealthcheck(): void
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/healthcheck');

        $this->assertResponseIsSuccessful();
        $this->assertJson($client->getResponse()->getContent());
        $this->assertStringContainsString('"status":"ok"', $client->getResponse()->getContent());
    }
}
