<?php
declare(strict_types=1);

namespace Arlauskas\VersionChecker\Tests;

use Arlauskas\VersionChecker\CheckerClient;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class CheckerClientTest extends TestCase
{
    private CheckerClient $checkerClient;
    private Client|MockObject $client;

    public function testRequestVersions(): void
    {
        $response = new Response(200, [], $this->symfonyReleasesContent());
        $this->client
            ->expects(self::once())
            ->method('request')
            ->willReturn($response)
        ;

        $versions = $this->checkerClient->requestVersions();
        $this->assertIsArray($versions);
    }

    protected function setUp(): void
    {
        $this->client = $this->createMock(Client::class);
        $this->checkerClient = new CheckerClient($this->client);
    }

    private function symfonyReleasesContent(): string
    {
        $response = [
            'symfony_versions' => [
                'lts' => '6.4.16',
                'stable' => '7.2.0',
                'next' => '7.3.0-DEV'
            ],
            'latest_stable_version' => '7.2',
            'supported_versions' => [
                '6.4',
                '7.1',
                '7.2'
            ],
            'maintained_versions' => [
                '6.4',
                '7.1',
                '7.2',
                '7.3'
            ],
            'security_maintained_versions' => [
                '5.4'
            ],
            'flex_supported_versions' => [
                '3.4',
                '4.0',
                '4.1',
                '4.2',
                '4.3',
                '4.4',
                '5.0',
                '5.1',
                '5.2',
                '5.3',
                '5.4',
                '6.0',
                '6.1',
                '6.2',
                '6.3',
                '6.4',
                '7.0',
                '7.1',
                '7.2',
                '7.3'
            ]
        ];

        return json_encode($response, JSON_THROW_ON_ERROR);
    }
}
