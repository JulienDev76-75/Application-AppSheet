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

    const Trimestre = ["T1", "T2", "T3", "T4"];
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
     * @Assert\Choice(choices=Rig::Trimestre, message="Veuillez choisir entre ces 4 trimestres.")
     */
    private $periode;

    /**
     * @ORM\Column(type="date", nullable=false)
     */
    private $date;

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

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
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

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

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
}
