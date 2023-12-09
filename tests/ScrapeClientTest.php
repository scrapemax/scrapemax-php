<?php

namespace Scrapemax\Tests;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\ResponseInterface;
use Scrapemax\ScrapemaxClient;

class ScrapeClientTest extends TestCase
{
    public function testScrape()
    {
        // Mock a Guzzle HTTP response
        $mock = new MockHandler([
            new Response(200, [], json_encode(['data' => 'test response']))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new GuzzleClient(['handler' => $handlerStack]);

        // Instantiate your ScrapeClient with the mocked Guzzle client
        $scrapeClient = new ScrapemaxClient('http://example.com', 'api_key', $client);

        // Call the method you want to test
        $response = $scrapeClient->scrape(['target_url' => 'http://test.com']);

        // Assert the expected response
        $this->assertInstanceOf(ResponseInterface::class, $response);
    }
}