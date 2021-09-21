<?php

namespace App\Entity;

use App\Repository\CartesCadeauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CartesCadeauxRepository::class)
 */
class CartesCadeaux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="float")
     */
    private $nombre_cartes_vendues;

    /**
     * @ORM\Column(type="float")
     */
    private $valorisation_ventes;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nombre_carte_utilisees;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $solde;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valorisation_utilisation;

    /**
     * @ORM\ManyToOne(targetEntity=Sites::class, inversedBy="cartesCadeaux")
     * @ORM\JoinColumn(nullable=false)  
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="cartesCadeaux")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getNombreCartesVendues(): ?float
    {
        return $this->nombre_cartes_vendues;
    }

    public function setNombreCartesVendues(float $nombre_cartes_vendues): self
    {
        $this->nombre_cartes_vendues = $nombre_cartes_vendues;

        return $this;
    }

    public function getValorisationVentes(): ?float
    {
        return $this->valorisation_ventes;
    }

    public function setValorisationVentes(float $valorisation_ventes): self
    {
        $this->valorisation_ventes = $valorisation_ventes;

        return $this;
    }

    public function getNombreCarteUtilisees(): ?int
    {
        return $this->nombre_carte_utilisees;
    }

    public function setNombreCarteUtilisees(?int $nombre_carte_utilisees): self
    {
        $this->nombre_carte_utilisees = $nombre_carte_utilisees;

        return $this;
    }

    public function getSolde(): ?float
    {
        return $this->solde;
    }

    public function setSolde(?float $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getValorisationUtilisation(): ?float
    {
        return $this->valorisation_utilisation;
    }

    public function setValorisationUtilisation(?float $valorisation_utilisation): self
    {
        $this->valorisation_utilisation = $valorisation_utilisation;

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
