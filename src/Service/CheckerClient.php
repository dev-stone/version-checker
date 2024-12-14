<?php
declare(strict_types=1);

namespace VersionChecker\Service;

use GuzzleHttp\Client;
use VersionChecker\Dto\SymfonyVersions;

class CheckerClient
{
    private string $url = 'https://symfony.com/releases.json';

    public function __construct(private Client $client, private CheckerSerializer $serializer)
    {
    }

    public function requestVersions(): SymfonyVersions
    {
        $response = $this->client->request('GET', $this->url);
        $body = $response->getBody()->getContents();

        return $this->serializer->deserializeVersions($body);
    }
}
