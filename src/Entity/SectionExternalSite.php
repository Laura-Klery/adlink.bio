<?php

namespace App\Entity;

use App\Repository\SectionExternalSiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionExternalSiteRepository::class)
 */
class SectionExternalSite
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $externalSiteBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $buttonBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $externalSiteLinkColor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="sectionExternalSite", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getExternalSiteBackground(): ?string
    {
        return $this->externalSiteBackground;
    }

    public function setExternalSiteBackground(?string $externalSiteBackground): self
    {
        $this->externalSiteBackground = $externalSiteBackground;

        return $this;
    }

    public function getButtonBackground(): ?string
    {
        return $this->buttonBackground;
    }

    public function setButtonBackground(?string $buttonBackground): self
    {
        $this->buttonBackground = $buttonBackground;

        return $this;
    }

    public function getExternalSiteLinkColor(): ?string
    {
        return $this->externalSiteLinkColor;
    }

    public function setExternalSiteLinkColor(?string $externalSiteLinkColor): self
    {
        $this->externalSiteLinkColor = $externalSiteLinkColor;

        return $this;
    }

    public function isEnabled(): ?bool
    {
        return $this->enabled;
    }

    public function setEnabled(bool $enabled): self
    {
        $this->enabled = $enabled;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
