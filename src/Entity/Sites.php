<?php

namespace App\Entity;

use App\Repository\SitesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SitesRepository::class)
 */
class Sites
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
    private $type_contrat;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $type_societe;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $raison_sociale;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom_du_site;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse1;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adresse2;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="date_immutable")
     */
    private $date_debut;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_fin;

    /**
     * @ORM\Column(type="date")
     */
    private $date_premier_contrat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ctrl_acces;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="sites")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=CartesCadeaux::class, mappedBy="site", orphanRemoval=true)
     */
    private $cartesCadeaux;

    public function __construct()
    {
        $this->cartesCadeauxes = new ArrayCollection();
        $this->cartesCadeaux = new ArrayCollection();
    }


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

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

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

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

        return $this;
    }

    public function getNomDuSite(): ?string
    {
        return $this->nom_du_site;
    }

    public function setNomDuSite(string $nom_du_site): self
    {
        $this->nom_du_site = $nom_du_site;

        return $this;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeImmutable
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeImmutable $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(?\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getDatePremierContrat(): ?\DateTimeInterface
    {
        return $this->date_premier_contrat;
    }

    public function setDatePremierContrat(\DateTimeInterface $date_premier_contrat): self
    {
        $this->date_premier_contrat = $date_premier_contrat;

        return $this;
    }

    public function getCtrlAcces(): ?string
    {
        return $this->ctrl_acces;
    }

    public function setCtrlAcces(?string $ctrl_acces): self
    {
        $this->ctrl_acces = $ctrl_acces;

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

    /**
     * @return Collection|CartesCadeaux[]
     */
    public function getCartesCadeaux(): Collection
    {
        return $this->cartesCadeaux;
    }

    public function addCartesCadeaux(CartesCadeaux $cartesCadeaux): self
    {
        if (!$this->cartesCadeaux->contains($cartesCadeaux)) {
            $this->cartesCadeaux[] = $cartesCadeaux;
            $cartesCadeaux->setSite($this);
        }

        return $this;
    }

    public function removeCartesCadeaux(CartesCadeaux $cartesCadeaux): self
    {
        if ($this->cartesCadeaux->removeElement($cartesCadeaux)) {
            // set the owning side to null (unless already changed)
            if ($cartesCadeaux->getSite() === $this) {
                $cartesCadeaux->setSite(null);
            }
        }

        return $this;
    }
    
    public function __toString() {
        return $this->getNomDuSite();
    }

}
