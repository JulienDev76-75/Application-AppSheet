<?php

namespace App\Entity;

use App\Repository\RigRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * @ORM\Entity(repositoryClass=RigRepository::class)
 */
class Rig
{

    const Mois = ["janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre"];
    const Activite = ["PISC", "PAT", "TL"];
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Choice(choices=Rig::Activite, message="Veuillez choisir entre ces 3 activités.")
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Choice(choices=Rig::Mois, message="Veuillez choisir un mois valide et en minuscule, par exemple : 'janvier'.")
     */
    private $mois;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $frequentation;

    /**
     * @ORM\Column(type="float", nullable=false)
     */
    private $panier_moyen;

    /**
     * @ORM\ManyToOne(targetEntity=Sites::class, inversedBy="rigs")
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="rigs")
     */
    private $user;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getActivite(): ?string
    {
        return $this->activite;
    }

    public function setActivite(string $activite): self
    {
        $this->activite = $activite;

        return $this;
    }

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(?string $mois): self
    {
        $this->mois = $mois;

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

    public function getFrequentation(): ?float
    {
        return $this->frequentation;
    }

    public function setFrequentation(float $frequentation): self
    {
        $this->frequentation = $frequentation;

        return $this;
    }

    public function getPanierMoyen(): ?float
    {
        return $this->panier_moyen;
    }

    public function setPanierMoyen(?float $panier_moyen): self
    {
        $this->panier_moyen = $panier_moyen;

        return $this;
    }

    public function getSite(): ?Sites
    {
        return $this->site;
    }

    public function setSite(?Sites $site): self
    {
        $this->site = $site;

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

    public function getAnnee(): ?int
    {
        return $this->annee;
    }

    public function setAnnee(int $annee): self
    {
        $this->annee = $annee;

        return $this;
    }
}
