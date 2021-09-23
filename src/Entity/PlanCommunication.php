<?php

namespace App\Entity;

use App\Repository\PlanCommunicationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PlanCommunicationRepository::class)
 */
class PlanCommunication
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
    private $type_operation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objectif;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $offre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cout_com_interne;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cout_com_externe;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $frais_organisation;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $participation_partenaire;

    /**
     * @ORM\Column(type="float")
     */
    private $cout_total;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pass;

    /**
     * @ORM\Column(type="float")
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $roi;

    /**
     * @ORM\ManyToOne(targetEntity=Sites::class, inversedBy="planCommunications")
     */
    private $site;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="planCommunications")
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

    public function getTypeActivite(): ?string
    {
        return $this->type_activite;
    }

    public function setTypeActivite(string $type_activite): self
    {
        $this->type_activite = $type_activite;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateDeFin(): ?\DateTimeInterface
    {
        return $this->date_de_fin;
    }

    public function setDateDeFin(?\DateTimeInterface $date_de_fin): self
    {
        $this->date_de_fin = $date_de_fin;

        return $this;
    }

    public function getTypeOperation(): ?string
    {
        return $this->type_operation;
    }

    public function setTypeOperation(string $type_operation): self
    {
        $this->type_operation = $type_operation;

        return $this;
    }

    public function getCible(): ?string
    {
        return $this->cible;
    }

    public function setCible(string $cible): self
    {
        $this->cible = $cible;

        return $this;
    }

    public function getObjectif(): ?string
    {
        return $this->objectif;
    }

    public function setObjectif(string $objectif): self
    {
        $this->objectif = $objectif;

        return $this;
    }

    public function getOffre(): ?string
    {
        return $this->offre;
    }

    public function setOffre(string $offre): self
    {
        $this->offre = $offre;

        return $this;
    }

    public function getCoutComInterne(): ?float
    {
        return $this->cout_com_interne;
    }

    public function setCoutComInterne(float $cout_com_interne): self
    {
        $this->cout_com_interne = $cout_com_interne;

        return $this;
    }

    public function getCoutComExterne(): ?float
    {
        return $this->cout_com_externe;
    }

    public function setCoutComExterne(?float $cout_com_externe): self
    {
        $this->cout_com_externe = $cout_com_externe;

        return $this;
    }

    public function getFraisOrganisation(): ?float
    {
        return $this->frais_organisation;
    }

    public function setFraisOrganisation(float $frais_organisation): self
    {
        $this->frais_organisation = $frais_organisation;

        return $this;
    }

    public function getParticipationPartenaire(): ?float
    {
        return $this->participation_partenaire;
    }

    public function setParticipationPartenaire(?float $participation_partenaire): self
    {
        $this->participation_partenaire = $participation_partenaire;

        return $this;
    }

    public function getCoutTotal(): ?float
    {
        return $this->cout_total;
    }

    public function setCoutTotal(float $cout_total): self
    {
        $this->cout_total = $cout_total;

        return $this;
    }

    public function getPass(): ?float
    {
        return $this->pass;
    }

    public function setPass(?float $pass): self
    {
        $this->pass = $pass;

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

    public function getRoi(): ?float
    {
        return $this->roi;
    }

    public function setRoi(?float $roi): self
    {
        $this->roi = $roi;

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
