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
    private $background_external_site;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_button;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_name_link;

    /**
     * @ORM\OneToMany(targetEntity=ExternalSite::class, mappedBy="section_external_site")
     */
    private $externalSites;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionExternalSites")
     */
    private $customer;

    public function __construct()
    {
        $this->externalSites = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackgroundExternalSite(): ?string
    {
        return $this->background_external_site;
    }

    public function setBackgroundExternalSite(?string $background_external_site): self
    {
        $this->background_external_site = $background_external_site;

        return $this;
    }

    public function getBackgroundButton(): ?string
    {
        return $this->background_button;
    }

    public function setBackgroundButton(?string $background_button): self
    {
        $this->background_button = $background_button;

        return $this;
    }

    public function getColorNameLink(): ?string
    {
        return $this->color_name_link;
    }

    public function setColorNameLink(?string $color_name_link): self
    {
        $this->color_name_link = $color_name_link;

        return $this;
    }

    /**
     * @return Collection<int, ExternalSite>
     */
    public function getExternalSites(): Collection
    {
        return $this->externalSites;
    }

    public function addExternalSite(ExternalSite $externalSite): self
    {
        if (!$this->externalSites->contains($externalSite)) {
            $this->externalSites[] = $externalSite;
            $externalSite->setSectionExternalSite($this);
        }

        return $this;
    }

    public function removeExternalSite(ExternalSite $externalSite): self
    {
        if ($this->externalSites->removeElement($externalSite)) {
            // set the owning side to null (unless already changed)
            if ($externalSite->getSectionExternalSite() === $this) {
                $externalSite->setSectionExternalSite(null);
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
