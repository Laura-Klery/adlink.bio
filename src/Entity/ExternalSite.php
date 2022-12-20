<?php

namespace App\Entity;

use App\Repository\ExternalSiteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExternalSiteRepository::class)
 */
class ExternalSite
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $link;

    /**
     * @ORM\ManyToOne(targetEntity=SectionSocialNetwork::class, inversedBy="externalSites")
     */
    private $sectionSocialNetwork;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(?string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getSectionSocialNetwork(): ?SectionSocialNetwork
    {
        return $this->sectionSocialNetwork;
    }

    public function setSectionSocialNetwork(?SectionSocialNetwork $sectionSocialNetwork): self
    {
        $this->sectionSocialNetwork = $sectionSocialNetwork;

        return $this;
    }
}
