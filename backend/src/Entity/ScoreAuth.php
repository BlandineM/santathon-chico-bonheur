<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreAuthRepository")
 */
class ScoreAuth
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $pointAuth;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Authors", mappedBy="scoreAuth", cascade={"persist", "remove"})
     */
    private $authors;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointAuth(): ?int
    {
        return $this->pointAuth;
    }

    public function setPointAuth(int $pointAuth): self
    {
        $this->pointAuth = $pointAuth;

        return $this;
    }

    public function getAuthors(): ?Authors
    {
        return $this->authors;
    }

    public function setAuthors(?Authors $authors): self
    {
        $this->authors = $authors;

        // set (or unset) the owning side of the relation if necessary
        $newScoreAuth = null === $authors ? null : $this;
        if ($authors->getScoreAuth() !== $newScoreAuth) {
            $authors->setScoreAuth($newScoreAuth);
        }

        return $this;
    }
}
