<?php
declare(strict_types=1);

namespace VersionChecker\Service;

use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AttributeLoader;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use VersionChecker\Dto\SymfonyVersions;

class CheckerSerializer
{
    private Serializer $serializer;

    public function deserializeVersions(string $content)
    {
        return $this->serializer->deserialize($content, SymfonyVersions::class, 'json');
    }

    public function defaultSerializer(): void
    {
        $classMetadataFactory = new ClassMetadataFactory(new AttributeLoader());
        $nameConverter = new MetadataAwareNameConverter($classMetadataFactory);
        $normalizers = [new ObjectNormalizer($classMetadataFactory, $nameConverter)];
        $encoders = [new JsonEncoder()];

        $this->serializer = new Serializer($normalizers, $encoders);
    }
}
