<?php

use Silex\WebTestCase;

class AppTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__ . '/../src/app.php';
    }

    public function testInitialPage()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertFalse($client->getResponse()->isOk());
    }
}
