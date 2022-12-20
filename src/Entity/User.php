<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $global_font_name;

    /**
     * @ORM\OneToMany(targetEntity=SectionVideo::class, mappedBy="customer")
     */
    private $sectionVideos;

    /**
     * @ORM\OneToMany(targetEntity=SectionBrand::class, mappedBy="customer")
     */
    private $sectionBrands;

    /**
     * @ORM\OneToMany(targetEntity=SectionSocialNetwork::class, mappedBy="customer")
     */
    private $sectionSocialNetworks;

    /**
     * @ORM\OneToMany(targetEntity=SectionExternalSite::class, mappedBy="customer")
     */
    private $sectionExternalSites;

    /**
     * @ORM\OneToMany(targetEntity=SectionPromotion::class, mappedBy="customer")
     */
    private $sectionPromotions;

    public function __construct()
    {
        $this->sectionVideos = new ArrayCollection();
        $this->sectionBrands = new ArrayCollection();
        $this->sectionSocialNetworks = new ArrayCollection();
        $this->sectionExternalSites = new ArrayCollection();
        $this->sectionPromotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getGlobalFontName(): ?string
    {
        return $this->global_font_name;
    }

    public function setGlobalFontName(string $global_font_name): self
    {
        $this->global_font_name = $global_font_name;

        return $this;
    }

    /**
     * @return Collection<int, SectionVideo>
     */
    public function getSectionVideos(): Collection
    {
        return $this->sectionVideos;
    }

    public function addSectionVideo(SectionVideo $sectionVideo): self
    {
        if (!$this->sectionVideos->contains($sectionVideo)) {
            $this->sectionVideos[] = $sectionVideo;
            $sectionVideo->setCustomer($this);
        }

        return $this;
    }

    public function removeSectionVideo(SectionVideo $sectionVideo): self
    {
        if ($this->sectionVideos->removeElement($sectionVideo)) {
            // set the owning side to null (unless already changed)
            if ($sectionVideo->getCustomer() === $this) {
                $sectionVideo->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionBrand>
     */
    public function getSectionBrands(): Collection
    {
        return $this->sectionBrands;
    }

    public function addSectionBrand(SectionBrand $sectionBrand): self
    {
        if (!$this->sectionBrands->contains($sectionBrand)) {
            $this->sectionBrands[] = $sectionBrand;
            $sectionBrand->setCustomer($this);
        }

        return $this;
    }

    public function removeSectionBrand(SectionBrand $sectionBrand): self
    {
        if ($this->sectionBrands->removeElement($sectionBrand)) {
            // set the owning side to null (unless already changed)
            if ($sectionBrand->getCustomer() === $this) {
                $sectionBrand->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionSocialNetwork>
     */
    public function getSectionSocialNetworks(): Collection
    {
        return $this->sectionSocialNetworks;
    }

    public function addSectionSocialNetwork(SectionSocialNetwork $sectionSocialNetwork): self
    {
        if (!$this->sectionSocialNetworks->contains($sectionSocialNetwork)) {
            $this->sectionSocialNetworks[] = $sectionSocialNetwork;
            $sectionSocialNetwork->setCustomer($this);
        }

        return $this;
    }

    public function removeSectionSocialNetwork(SectionSocialNetwork $sectionSocialNetwork): self
    {
        if ($this->sectionSocialNetworks->removeElement($sectionSocialNetwork)) {
            // set the owning side to null (unless already changed)
            if ($sectionSocialNetwork->getCustomer() === $this) {
                $sectionSocialNetwork->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionExternalSite>
     */
    public function getSectionExternalSites(): Collection
    {
        return $this->sectionExternalSites;
    }

    public function addSectionExternalSite(SectionExternalSite $sectionExternalSite): self
    {
        if (!$this->sectionExternalSites->contains($sectionExternalSite)) {
            $this->sectionExternalSites[] = $sectionExternalSite;
            $sectionExternalSite->setCustomer($this);
        }

        return $this;
    }

    public function removeSectionExternalSite(SectionExternalSite $sectionExternalSite): self
    {
        if ($this->sectionExternalSites->removeElement($sectionExternalSite)) {
            // set the owning side to null (unless already changed)
            if ($sectionExternalSite->getCustomer() === $this) {
                $sectionExternalSite->setCustomer(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, SectionPromotion>
     */
    public function getSectionPromotions(): Collection
    {
        return $this->sectionPromotions;
    }

    public function addSectionPromotion(SectionPromotion $sectionPromotion): self
    {
        if (!$this->sectionPromotions->contains($sectionPromotion)) {
            $this->sectionPromotions[] = $sectionPromotion;
            $sectionPromotion->setCustomer($this);
        }

        return $this;
    }

    public function removeSectionPromotion(SectionPromotion $sectionPromotion): self
    {
        if ($this->sectionPromotions->removeElement($sectionPromotion)) {
            // set the owning side to null (unless already changed)
            if ($sectionPromotion->getCustomer() === $this) {
                $sectionPromotion->setCustomer(null);
            }
        }

        return $this;
    }
}
