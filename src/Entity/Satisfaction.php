<?php

namespace App\Entity;

use App\Repository\SatisfactionRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SatisfactionRepository::class)
 */
class Satisfaction
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $trimestre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $satis_globale;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $satis_proprete;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $competence_du_personnel;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperature_douche;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $satis_horaires;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $repondant;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="satisfactions")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSite(): ?string
    {
        return $this->site;
    }

    public function setSite(string $site): self
    {
        $this->site = $site;

        return $this;
    }

    public function getTrimestre(): ?string
    {
        return $this->trimestre;
    }

    public function setTrimestre(string $trimestre): self
    {
        $this->trimestre = $trimestre;

        return $this;
    }

    public function getSatisGlobale(): ?float
    {
        return $this->satis_globale;
    }

    public function setSatisGlobale(?float $satis_globale): self
    {
        $this->satis_globale = $satis_globale;

        return $this;
    }

    public function getSatisProprete(): ?float
    {
        return $this->satis_proprete;
    }

    public function setSatisProprete(?float $satis_proprete): self
    {
        $this->satis_proprete = $satis_proprete;

        return $this;
    }

    public function getCompetenceDuPersonnel(): ?float
    {
        return $this->competence_du_personnel;
    }

    public function setCompetenceDuPersonnel(?float $competence_du_personnel): self
    {
        $this->competence_du_personnel = $competence_du_personnel;

        return $this;
    }

    public function getTemperatureDouche(): ?float
    {
        return $this->temperature_douche;
    }

    public function setTemperatureDouche(?float $temperature_douche): self
    {
        $this->temperature_douche = $temperature_douche;

        return $this;
    }

    public function getSatisHoraires(): ?float
    {
        return $this->satis_horaires;
    }

    public function setSatisHoraires(?float $satis_horaires): self
    {
        $this->satis_horaires = $satis_horaires;

        return $this;
    }

    public function getRepondant(): ?float
    {
        return $this->repondant;
    }

    public function setRepondant(?float $repondant): self
    {
        $this->repondant = $repondant;

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
