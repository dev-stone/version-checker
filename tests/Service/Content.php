<?php
declare(strict_types=1);

namespace VersionChecker\Tests\Service;

class Content
{
    public static function symfonyReleasesContent(): string
    {
        return json_encode(self::symfonyReleasesArray(), JSON_THROW_ON_ERROR);
    }

    public static function symfonyReleasesArray(): array
    {
        return [
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
    }
}
