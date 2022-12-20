<?php

namespace App\Entity;

use App\Repository\SectionPromotionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionPromotionRepository::class)
 */
class SectionPromotion
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
    private $background_promotion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_card_promotion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color_description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_description;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="sectionPromotion")
     */
    private $promotions;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionPromotions")
     */
    private $customer;

    public function __construct()
    {
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBackgroundPromotion(): ?string
    {
        return $this->background_promotion;
    }

    public function setBackgroundPromotion(?string $background_promotion): self
    {
        $this->background_promotion = $background_promotion;

        return $this;
    }

    public function getBackgroundCardPromotion(): ?string
    {
        return $this->background_card_promotion;
    }

    public function setBackgroundCardPromotion(?string $background_card_promotion): self
    {
        $this->background_card_promotion = $background_card_promotion;

        return $this;
    }

    public function getColorCode(): ?string
    {
        return $this->color_code;
    }

    public function setColorCode(?string $color_code): self
    {
        $this->color_code = $color_code;

        return $this;
    }

    public function getColorDescription(): ?string
    {
        return $this->color_description;
    }

    public function setColorDescription(?string $color_description): self
    {
        $this->color_description = $color_description;

        return $this;
    }

    public function getBackgroundDescription(): ?string
    {
        return $this->background_description;
    }

    public function setBackgroundDescription(?string $background_description): self
    {
        $this->background_description = $background_description;

        return $this;
    }

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotions(): Collection
    {
        return $this->promotions;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotions->contains($promotion)) {
            $this->promotions[] = $promotion;
            $promotion->setSectionPromotion($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getSectionPromotion() === $this) {
                $promotion->setSectionPromotion(null);
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
