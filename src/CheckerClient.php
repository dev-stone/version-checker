<?php
declare(strict_types=1);

namespace Arlauskas\VersionChecker;

use GuzzleHttp\Client;

class CheckerClient
{
    private string $url = 'https://symfony.com/releases.json';

    public function __construct(private Client $client)
    {
    }

    public function requestVersions(): array
    {
        $response = $this->client->request('GET', $this->url);
        $body = $response->getBody()->getContents();

        return json_decode($body, true);
    }
}
