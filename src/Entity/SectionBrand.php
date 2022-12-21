<?php

namespace App\Entity;

use App\Repository\SectionBrandRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionBrandRepository::class)
 */
class SectionBrand
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $logo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brand_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_brand;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_brand_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_baseline;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionBrands")
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogo(): ?string
    {
        return $this->logo;
    }

    public function setLogo(?string $logo): self
    {
        $this->logo = $logo;

        return $this;
    }

    public function getBrandName(): ?string
    {
        return $this->brand_name;
    }

    public function setBrandName(?string $brand_name): self
    {
        $this->brand_name = $brand_name;

        return $this;
    }

    public function getBaseline(): ?string
    {
        return $this->baseline;
    }

    public function setBaseline(?string $baseline): self
    {
        $this->baseline = $baseline;

        return $this;
    }

    public function getBackgroundBrand(): ?string
    {
        return $this->background_brand;
    }

    public function setBackgroundBrand(?string $background_brand): self
    {
        $this->background_brand = $background_brand;

        return $this;
    }

    public function getColorBrandName(): ?string
    {
        return $this->color_brand_name;
    }

    public function setColorBrandName(?string $color_brand_name): self
    {
        $this->color_brand_name = $color_brand_name;

        return $this;
    }

    public function getColorBaseline(): ?string
    {
        return $this->color_baseline;
    }

    public function setColorBaseline(?string $color_baseline): self
    {
        $this->color_baseline = $color_baseline;

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

    public function __toString() { return $this->brand_name; }
}
