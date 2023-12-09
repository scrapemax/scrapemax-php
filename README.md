# Scrapemax PHP API Client

A PHP client for the Scrapemax API.

## Installation

```bash
composer require scrapemax/scrapemax-php
```

### Usage

```php
require_once 'vendor/autoload.php';

use Scrapemax\ScrapemaxClient;

// Instantiate the ScrapeClient with the API base URL and key
$client = new ScrapemaxClient('https://api.scrapemax.com', 'your_api_key');

// Use the ScrapeClient to make API requests
$response = $client->scrape([
    'js_enabled' => 1,
    'target_url' => 'https://example.com/page',
    'proxy' => 'premium',
    'type' => 'data'
]);

print_r($response);

```

### Custom Guzzle Client

If you have specific requirements for your Guzzle client, you can use your own instance by passing it as the third parameter to the `ScrapeClient` constructor. Ensure that the custom client includes the 'base_uri' option to specify the API endpoint. Here's an example:

```php
use GuzzleHttp\Client as GuzzleClient;
use Scrapemax\ScrapemaxClient;

// Instantiate a custom Guzzle client with additional configuration
$customGuzzleClient = new GuzzleClient([
    'base_uri' => 'https://api.scrapemax.com',
    'timeout' => 5,
    // Add any other Guzzle client options as needed
]);

// Instantiate the ScrapeClient with the API base URL, key, and custom Guzzle client
$client = new ScrapemaxClient('https://api.scrapemax.com', 'your_api_key', $customGuzzleClient);

// Use the ScrapeClient to make API requests with the custom Guzzle client
$response = $client->scrape([
    'js_enabled' => 1,
    'target_url' => 'https://example.com/page',
    'proxy' => 'premium',
    'type' => 'data'
]);

print_r($response);