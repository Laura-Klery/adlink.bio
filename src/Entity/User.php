<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $globalFontName;

    /**
     * @ORM\OneToMany(targetEntity=ExternalSite::class, mappedBy="user", orphanRemoval=true)
     */
    private $externalSites;

    /**
     * @ORM\OneToMany(targetEntity=Promotion::class, mappedBy="user", orphanRemoval=true)
     */
    private $promotions;

    /**
     * @ORM\OneToOne(targetEntity=SectionBrand::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $sectionBrand;

    /**
     * @ORM\OneToOne(targetEntity=SectionExternalSite::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $sectionExternalSite;

    /**
     * @ORM\OneToOne(targetEntity=SectionPromotion::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $sectionPromotion;

    /**
     * @ORM\OneToOne(targetEntity=SectionSocialNetwork::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $sectionSocialNetwork;

    /**
     * @ORM\OneToOne(targetEntity=SectionVideo::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $sectionVideo;

    /**
     * @ORM\OneToOne(targetEntity=SocialNetwork::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $socialNetwork;

    public function __construct()
    {
        $this->externalSites = new ArrayCollection();
        $this->promotions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getGlobalFontName(): ?string
    {
        return $this->globalFontName;
    }

    public function setGlobalFontName(?string $globalFontName): self
    {
        $this->globalFontName = $globalFontName;

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
            $externalSite->setUser($this);
        }

        return $this;
    }

    public function removeExternalSite(ExternalSite $externalSite): self
    {
        if ($this->externalSites->removeElement($externalSite)) {
            // set the owning side to null (unless already changed)
            if ($externalSite->getUser() === $this) {
                $externalSite->setUser(null);
            }
        }

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
            $promotion->setUser($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotions->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getUser() === $this) {
                $promotion->setUser(null);
            }
        }

        return $this;
    }

    public function getSectionBrand(): ?SectionBrand
    {
        return $this->sectionBrand;
    }

    public function setSectionBrand(?SectionBrand $sectionBrand): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionBrand === null && $this->sectionBrand !== null) {
            $this->sectionBrand->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionBrand !== null && $sectionBrand->getUser() !== $this) {
            $sectionBrand->setUser($this);
        }

        $this->sectionBrand = $sectionBrand;

        return $this;
    }

    public function getSectionExternalSite(): ?SectionExternalSite
    {
        return $this->sectionExternalSite;
    }

    public function setSectionExternalSite(?SectionExternalSite $sectionExternalSite): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionExternalSite === null && $this->sectionExternalSite !== null) {
            $this->sectionExternalSite->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionExternalSite !== null && $sectionExternalSite->getUser() !== $this) {
            $sectionExternalSite->setUser($this);
        }

        $this->sectionExternalSite = $sectionExternalSite;

        return $this;
    }

    public function getSectionPromotion(): ?SectionPromotion
    {
        return $this->sectionPromotion;
    }

    public function setSectionPromotion(?SectionPromotion $sectionPromotion): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionPromotion === null && $this->sectionPromotion !== null) {
            $this->sectionPromotion->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionPromotion !== null && $sectionPromotion->getUser() !== $this) {
            $sectionPromotion->setUser($this);
        }

        $this->sectionPromotion = $sectionPromotion;

        return $this;
    }

    public function getSectionSocialNetwork(): ?SectionSocialNetwork
    {
        return $this->sectionSocialNetwork;
    }

    public function setSectionSocialNetwork(?SectionSocialNetwork $sectionSocialNetwork): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionSocialNetwork === null && $this->sectionSocialNetwork !== null) {
            $this->sectionSocialNetwork->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionSocialNetwork !== null && $sectionSocialNetwork->getUser() !== $this) {
            $sectionSocialNetwork->setUser($this);
        }

        $this->sectionSocialNetwork = $sectionSocialNetwork;

        return $this;
    }

    public function getSectionVideo(): ?SectionVideo
    {
        return $this->sectionVideo;
    }

    public function setSectionVideo(?SectionVideo $sectionVideo): self
    {
        // unset the owning side of the relation if necessary
        if ($sectionVideo === null && $this->sectionVideo !== null) {
            $this->sectionVideo->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($sectionVideo !== null && $sectionVideo->getUser() !== $this) {
            $sectionVideo->setUser($this);
        }

        $this->sectionVideo = $sectionVideo;

        return $this;
    }

    public function getSocialNetwork(): ?SocialNetwork
    {
        return $this->socialNetwork;
    }

    public function setSocialNetwork(?SocialNetwork $socialNetwork): self
    {
        // unset the owning side of the relation if necessary
        if ($socialNetwork === null && $this->socialNetwork !== null) {
            $this->socialNetwork->setUser(null);
        }

        // set the owning side of the relation if necessary
        if ($socialNetwork !== null && $socialNetwork->getUser() !== $this) {
            $socialNetwork->setUser($this);
        }

        $this->socialNetwork = $socialNetwork;

        return $this;
    }
}
