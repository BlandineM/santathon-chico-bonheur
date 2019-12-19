<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorsRepository")
 */
class Authors
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=70)
     */
    private $auth_name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Citations", mappedBy="author", orphanRemoval=true)
     */
    private $citations;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ScoreAuth", inversedBy="authors", cascade={"persist", "remove"})
     */
    private $scoreAuth;

    /**
     * @ORM\Column(type="string", length=255")
     */
    private $image;

    public function __construct()
    {
        $this->citations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthName(): ?string
    {
        return $this->auth_name;
    }

    public function setAuthName(string $auth_name): self
    {
        $this->auth_name = $auth_name;

        return $this;
    }

    /**
     * @return Collection|Citations[]
     */
    public function getCitations(): Collection
    {
        return $this->citations;
    }

    public function addCitation(Citations $citation): self
    {
        if (!$this->citations->contains($citation)) {
            $this->citations[] = $citation;
            $citation->setAuthor($this);
        }

        return $this;
    }

    public function removeCitation(Citations $citation): self
    {
        if ($this->citations->contains($citation)) {
            $this->citations->removeElement($citation);
            // set the owning side to null (unless already changed)
            if ($citation->getAuthor() === $this) {
                $citation->setAuthor(null);
            }
        }

        return $this;
    }

    public function getScoreAuth(): ?ScoreAuth
    {
        return $this->scoreAuth;
    }

    public function setScoreAuth(?ScoreAuth $scoreAuth): self
    {
        $this->scoreAuth = $scoreAuth;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}
