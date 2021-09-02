<?php

namespace App\Entity;

use App\Repository\SwotRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SwotRepository::class)
 */
class Swot
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $forces;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $faiblesses;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $opportunites;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $menaces;

    /**
     * @ORM\OneToOne(targetEntity=Sites::class, inversedBy="swot", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sites;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }

    public function getForces(): ?string
    {
        return $this->forces;
    }

    public function setForces(?string $forces): self
    {
        $this->forces = $forces;

        return $this;
    }

    public function getFaiblesses(): ?string
    {
        return $this->faiblesses;
    }

    public function setFaiblesses(?string $faiblesses): self
    {
        $this->faiblesses = $faiblesses;

        return $this;
    }

    public function getOpportunites(): ?string
    {
        return $this->opportunites;
    }

    public function setOpportunites(?string $opportunites): self
    {
        $this->opportunites = $opportunites;

        return $this;
    }

    public function getMenaces(): ?string
    {
        return $this->menaces;
    }

    public function setMenaces(?string $menaces): self
    {
        $this->menaces = $menaces;

        return $this;
    }

    public function getSites(): ?Sites
    {
        return $this->sites;
    }

    public function setSites(Sites $sites): self
    {
        $this->sites = $sites;

        return $this;
    }
}
