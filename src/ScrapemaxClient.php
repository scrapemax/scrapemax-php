<?php

namespace Scrapemax;

use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class ScrapemaxClient
{
    private Client $client;
    private string $apiKey;

    public function __construct(string $baseUrl, string $apiKey, ?Client $client = null)
    {
        $this->client = $client ?: new Client(['base_uri' => $baseUrl]);

        $this->apiKey = $apiKey;
    }

    public function scrape($params): ResponseInterface
    {
        $response = $this->client
            ->request(
                'GET',
                '/scrape',
                [
                    'query' => array_merge($params, ['api_key' => $this->apiKey])
                ]
            );

        return $response;
    }
}