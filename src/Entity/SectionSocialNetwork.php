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
    private $background_social_network;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_icons;

    /**
     * @ORM\OneToMany(targetEntity=SocialNetwork::class, mappedBy="sectionSocialNetwork")
     */
    private $socialNetworks;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionSocialNetworks")
     */
    private $customer;

    public function __construct()
    {
        $this->socialNetworks = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackgroundSocialNetwork(): ?string
    {
        return $this->background_social_network;
    }

    public function setBackgroundSocialNetwork(?string $background_social_network): self
    {
        $this->background_social_network = $background_social_network;

        return $this;
    }

    public function getColorIcons(): ?string
    {
        return $this->color_icons;
    }

    public function setColorIcons(?string $color_icons): self
    {
        $this->color_icons = $color_icons;

        return $this;
    }

    /**
     * @return Collection<int, SocialNetwork>
     */
    public function getSocialNetworks(): Collection
    {
        return $this->socialNetworks;
    }

    public function addSocialNetwork(SocialNetwork $socialNetwork): self
    {
        if (!$this->socialNetworks->contains($socialNetwork)) {
            $this->socialNetworks[] = $socialNetwork;
            $socialNetwork->setSectionSocialNetwork($this);
        }

        return $this;
    }

    public function removeSocialNetwork(SocialNetwork $socialNetwork): self
    {
        if ($this->socialNetworks->removeElement($socialNetwork)) {
            // set the owning side to null (unless already changed)
            if ($socialNetwork->getSectionSocialNetwork() === $this) {
                $socialNetwork->setSectionSocialNetwork(null);
            }
        }

        return $this;
    }

    public function getCustomer(): ?User
    {
        return $this->customer;
    }

    public function setCustomer(?User $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
