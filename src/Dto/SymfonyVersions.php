<?php
declare(strict_types=1);

namespace VersionChecker\Dto;

use Symfony\Component\Serializer\Attribute\SerializedPath;

class SymfonyVersions
{
    #[SerializedPath('[symfony_versions][lts]')]
    private ?string $lts = null;
    #[SerializedPath('[symfony_versions][stable]')]
    private ?string $stable = null;
    #[SerializedPath('[symfony_versions][next]')]
    private ?string $next = null;
    private ?string $latestStableVersion = null;
    private array $supportedVersions;
    private array $maintainedVersions;
    private array $securityMaintainedVersions;
    private array $flexSupportedVersions;

    public function getLts(): ?string
    {
        return $this->lts;
    }

    public function setLts(string $lts): self
    {
        $this->lts = $lts;

        return $this;
    }

    public function getStable(): ?string
    {
        return $this->stable;
    }

    public function setStable(string $stable): self
    {
        $this->stable = $stable;

        return $this;
    }

    public function getNext(): ?string
    {
        return $this->next;
    }

    public function setNext(string $next): self
    {
        $this->next = $next;

        return $this;
    }

    public function getLatestStableVersion(): ?string
    {
        return $this->latestStableVersion;
    }

    public function setLatestStableVersion(string $latestStableVersion): self
    {
        $this->latestStableVersion = $latestStableVersion;

        return $this;
    }

    public function getSupportedVersions(): array
    {
        return $this->supportedVersions;
    }

    public function setSupportedVersions(array $supportedVersions): self
    {
        $this->supportedVersions = $supportedVersions;

        return $this;
    }

    public function getMaintainedVersions(): array
    {
        return $this->maintainedVersions;
    }

    public function setMaintainedVersions(array $maintainedVersions): self
    {
        $this->maintainedVersions = $maintainedVersions;

        return $this;
    }

    public function getSecurityMaintainedVersions(): array
    {
        return $this->securityMaintainedVersions;
    }

    public function setSecurityMaintainedVersions(array $securityMaintainedVersions): self
    {
        $this->securityMaintainedVersions = $securityMaintainedVersions;

        return $this;
    }

    public function getFlexSupportedVersions(): array
    {
        return $this->flexSupportedVersions;
    }

    public function setFlexSupportedVersions(array $flexSupportedVersions): self
    {
        $this->flexSupportedVersions = $flexSupportedVersions;

        return $this;
    }
}
