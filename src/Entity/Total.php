<?php

namespace App\Entity;

use App\Repository\TotalRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalRepository::class)
 */
class Total
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
    private $mois;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

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
    private $satis_horaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $temperature_douche;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $competence_personnel;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
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

    public function getSatisHoraire(): ?float
    {
        return $this->satis_horaire;
    }

    public function setSatisHoraire(?float $satis_horaire): self
    {
        $this->satis_horaire = $satis_horaire;

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

    public function getCompetencePersonnel(): ?float
    {
        return $this->competence_personnel;
    }

    public function setCompetencePersonnel(float $competence_personnel): self
    {
        $this->competence_personnel = $competence_personnel;

        return $this;
    }

}
