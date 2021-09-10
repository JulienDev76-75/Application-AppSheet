<?php

namespace App\Entity;

use App\Repository\PlanCommunicationRepository;
use Doctrine\ORM\Mapping as ORM;

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
     * @ORM\Column(type="text", nullable=true)
     */
    private $validation_sophie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_activite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_contrat;

    /**
     * @ORM\Column(type="date")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_de_fin;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_operation;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $operation_nationale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cible;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $objectif;

    /**
     * @ORM\Column(type="text")
     */
    private $offre;

    /**
     * @ORM\Column(type="float")
     */
    private $cout_com_interne;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cout_com_externe;

    /**
     * @ORM\Column(type="float")
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
     * @ORM\Column(type="float", nullable=true)
     */
    private $cartes;

    /**
     * @ORM\Column(type="float")
     */
    private $chiffre_affaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $roi;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $numero_ddc;

    /**
     * @ORM\Column(type="blob", nullable=true)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValidationSophie(): ?string
    {
        return $this->validation_sophie;
    }

    public function setValidationSophie(?string $validation_sophie): self
    {
        $this->validation_sophie = $validation_sophie;

        return $this;
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

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

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

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

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

    public function getOperationNationale(): ?string
    {
        return $this->operation_nationale;
    }

    public function setOperationNationale(string $operation_nationale): self
    {
        $this->operation_nationale = $operation_nationale;

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

    public function getCartes(): ?float
    {
        return $this->cartes;
    }

    public function setCartes(?float $cartes): self
    {
        $this->cartes = $cartes;

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

    public function getNumeroDdc(): ?float
    {
        return $this->numero_ddc;
    }

    public function setNumeroDdc(?float $numero_ddc): self
    {
        $this->numero_ddc = $numero_ddc;

        return $this;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
