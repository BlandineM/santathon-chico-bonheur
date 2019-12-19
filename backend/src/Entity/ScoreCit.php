<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ScoreCitRepository")
 */
class ScoreCit
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
    private $pointCit;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Citations", mappedBy="scoreCit", cascade={"persist", "remove"})
     */
    private $citations;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPointCit(): ?int
    {
        return $this->pointCit;
    }

    public function setPointCit(int $pointCit): self
    {
        $this->pointCit = $pointCit;

        return $this;
    }

    public function getCitations(): ?Citations
    {
        return $this->citations;
    }

    public function setCitations(?Citations $citations): self
    {
        $this->citations = $citations;

        // set (or unset) the owning side of the relation if necessary
        $newScoreCit = null === $citations ? null : $this;
        if ($citations->getScoreCit() !== $newScoreCit) {
            $citations->setScoreCit($newScoreCit);
        }

        return $this;
    }
}
