<?php
declare(strict_types=1);

namespace VersionChecker\Tests\Service;

use VersionChecker\Service\CheckerSerializer;
use PHPUnit\Framework\TestCase;

class CheckerSerializerTest extends TestCase
{
    public function testDeserializeVersions(): void
    {
        $serializer = new CheckerSerializer();
        $serializer->defaultSerializer();

        $versions = $serializer->deserializeVersions(Content::symfonyReleasesContent());

        $content = Content::symfonyReleasesArray();
        $this->assertEquals($content['symfony_versions']['lts'], $versions->getLts());
        $this->assertEquals($content['symfony_versions']['stable'], $versions->getStable());
        $this->assertEquals($content['symfony_versions']['next'], $versions->getNext());
        $this->assertEquals($content['latest_stable_version'], $versions->getLatestStableVersion());
        $this->assertEquals($content['supported_versions'], $versions->getSupportedVersions());
        $this->assertEquals($content['maintained_versions'], $versions->getMaintainedVersions());
        $this->assertEquals($content['security_maintained_versions'], $versions->getSecurityMaintainedVersions());
        $this->assertEquals($content['flex_supported_versions'], $versions->getFlexSupportedVersions());
    }
}
