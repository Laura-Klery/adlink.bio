<?php

namespace App\Entity;

use App\Repository\SectionVideoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SectionVideoRepository::class)
 */
class SectionVideo
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
    private $link;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $background_video;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sectionVideos")
     */
    private $customer;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBackgroundVideo(): ?string
    {
        return $this->background_video;
    }

    public function setBackgroundVideo(?string $background_video): self
    {
        $this->background_video = $background_video;

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
