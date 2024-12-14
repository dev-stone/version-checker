<?php
declare(strict_types=1);

namespace VersionChecker\Tests\Service;

use VersionChecker\Service\CheckerClient;
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
        $response = new Response(200, [], Content::symfonyReleasesContent());
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
}
