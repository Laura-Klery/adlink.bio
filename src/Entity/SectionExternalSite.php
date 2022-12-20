<?php

namespace App\Entity;

use App\Repository\SectionExternalSiteRepository;
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
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionExternalSites")
     */
    private $customer;

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
