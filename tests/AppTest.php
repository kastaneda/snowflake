<?php

use Silex\WebTestCase;

class AppTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__ . '/../src/app.php';
    }

    public function testFrontPageError()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertFalse($client->getResponse()->isOk());

        $this->assertTrue(
            $client->getResponse()->headers->contains(
                'Content-Type',
                'application/json'
            )
        );

        $content = $client->getResponse()->getContent();
        $json = \json_decode($content, true);
        $this->assertArrayHasKey('error', $json);
    }
}
