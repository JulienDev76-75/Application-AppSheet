<?php

namespace App\Entity;

use App\Repository\TotalRigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalRigRepository::class)
 */
class TotalRig
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $panier_moyen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mois_annee;

    /**
     * @ORM\Column(type="float")
     */
    private $freq;

    /**
     * @ORM\Column(type="float")
     */
    private $chiffre_affaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPanierMoyen(): ?float
    {
        return $this->panier_moyen;
    }

    public function setPanierMoyen(float $panier_moyen): self
    {
        $this->panier_moyen = $panier_moyen;

        return $this;
    }

    public function getMoisAnnee(): ?string
    {
        return $this->mois_annee;
    }

    public function setMoisAnnee(string $mois_annee): self
    {
        $this->mois = $mois_annee;

        return $this;
    }

    public function getFreq(): ?float
    {
        return $this->freq;
    }

    public function setFreq(float $freq): self
    {
        $this->freq = $freq;

        return $this;
    }

    public function getChiffreAffaire(): ?float
    {
        return $this->chiffre_affaire;
    }

    public function setChiffreAffaire(float $chiffre_affaire): self
    {
        $this->chiffre_affaire = $chiffre_affaire;

        return $this;
    }
}
