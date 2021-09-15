<?php

namespace App\Entity;

use App\Repository\RigRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RigRepository::class)
 */
class Rig
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
    private $ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_contrat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periode;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="float")
     */
    private $frequentation;

    /**
     * @ORM\Column(type="float", nullable=true)
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

    public function getTypeSociete(): ?string
    {
        return $this->type_societe;
    }

    public function setTypeSociete(string $type_societe): self
    {
        $this->type_societe = $type_societe;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

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
