<?php

namespace App\Entity;

use App\Repository\SectionSocialNetworkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionSocialNetworkRepository::class)
 */
class SectionSocialNetwork
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
    private $sectionSocialNetworkBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $socialNetworkIconColor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="sectionSocialNetwork", cascade={"persist", "remove"})
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionSocialNetworkBackground(): ?string
    {
        return $this->sectionSocialNetworkBackground;
    }

    public function setSectionSocialNetworkBackground(?string $sectionSocialNetworkBackground): self
    {
        $this->sectionSocialNetworkBackground = $sectionSocialNetworkBackground;

        return $this;
    }

    public function getSocialNetworkIconColor(): ?string
    {
        return $this->socialNetworkIconColor;
    }

    public function setSocialNetworkIconColor(?string $socialNetworkIconColor): self
    {
        $this->socialNetworkIconColor = $socialNetworkIconColor;

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
