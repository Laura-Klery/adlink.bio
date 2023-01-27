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
    private $sectionPromotionBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sectionPromotionCardBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sectionPromotionButtonBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sectionPromotionCodeColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sectionPromotionDescriptionColor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="sectionPromotion", cascade={"persist", "remove"})
     */
    private $user;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSectionPromotionBackground(): ?string
    {
        return $this->sectionPromotionBackground;
    }

    public function setSectionPromotionBackground(?string $sectionPromotionBackground): self
    {
        $this->sectionPromotionBackground = $sectionPromotionBackground;

        return $this;
    }

    public function getSectionPromotionCardBackground(): ?string
    {
        return $this->sectionPromotionCardBackground;
    }

    public function setSectionPromotionCardBackground(?string $sectionPromotionCardBackground): self
    {
        $this->sectionPromotionCardBackground = $sectionPromotionCardBackground;

        return $this;
    }

    public function getSectionPromotionButtonBackground(): ?string
    {
        return $this->sectionPromotionButtonBackground;
    }

    public function setSectionPromotionButtonBackground(?string $sectionPromotionButtonBackground): self
    {
        $this->sectionPromotionButtonBackground = $sectionPromotionButtonBackground;

        return $this;
    }

    public function getSectionPromotionCodeColor(): ?string
    {
        return $this->sectionPromotionCodeColor;
    }

    public function setSectionPromotionCodeColor(?string $sectionPromotionCodeColor): self
    {
        $this->sectionPromotionCodeColor = $sectionPromotionCodeColor;

        return $this;
    }

    public function getSectionPromotionDescriptionColor(): ?string
    {
        return $this->sectionPromotionDescriptionColor;
    }

    public function setSectionPromotionDescriptionColor(?string $sectionPromotionDescriptionColor): self
    {
        $this->sectionPromotionDescriptionColor = $sectionPromotionDescriptionColor;

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
