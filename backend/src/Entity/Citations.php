<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CitationsRepository")
 */
class Citations
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $resume;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Authors", inversedBy="citations")
     * @ORM\JoinColumn(nullable=false)
     */
    private $author;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ScoreCit", inversedBy="citations", cascade={"persist", "remove"})
     */
    private $scoreCit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getAuthor(): ?Authors
    {
        return $this->author;
    }

    public function setAuthor(?Authors $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function getScoreCit(): ?ScoreCit
    {
        return $this->scoreCit;
    }

    public function setScoreCit(?ScoreCit $scoreCit): self
    {
        $this->scoreCit = $scoreCit;

        return $this;
    }
}
