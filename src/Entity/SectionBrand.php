<?php

namespace App\Entity;

use App\Repository\SectionBrandRepository;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionBrandRepository::class)
 * @Vich\Uploadable
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brandName;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $baseline;

    /**
      * @ORM\Column(type="string", length=255)
      * @var string
     */
      private $logo;

    /**
     * @Vich\UploadableField(mapping="logoBrand", fileNameProperty="logo")
     * @var File
     */
    private $logoFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brandBackground;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brandNameColor;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $brandBaselineColor;

    /**
     * @ORM\Column(type="boolean")
     */
    private $enabled;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="sectionBrand", cascade={"persist", "remove"})
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBrandName(): ?string
    {
        return $this->brandName;
    }

    public function setBrandName(string $brandName): self
    {
        $this->brandName = $brandName;

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

    public function setLogoFile(File $logo = null)
    {
      $this->logoFile = $logo;

      // VERY IMPORTANT:
      // It is required that at least one field changes if you are using Doctrine,
      // otherwise the event listeners won't be called and the file is lost
      if ($logo) {
        // if 'updatedAt' is not defined in your entity, use another property
        $this->updatedAt = new \DateTime('now');
      }
    }

    public function getLogoFile()
    {
      return $this->logoFile;
    }

    public function setLogo($logo)
    {
      $this->logo = $logo;
    }

    public function getLogo()
    {
      return $this->logo;
    }

    public function getBrandBackground(): ?string
    {
        return $this->brandBackground;
    }

    public function setBrandBackground(string $brandBackground): self
    {
        $this->brandBackground = $brandBackground;

        return $this;
    }

    public function getBrandNameColor(): ?string
    {
        return $this->brandNameColor;
    }

    public function setBrandNameColor(string $brandNameColor): self
    {
        $this->brandNameColor = $brandNameColor;

        return $this;
    }

    public function getBrandBaselineColor(): ?string
    {
        return $this->brandBaselineColor;
    }

    public function setBrandBaselineColor(string $brandBaselineColor): self
    {
        $this->brandBaselineColor = $brandBaselineColor;

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
