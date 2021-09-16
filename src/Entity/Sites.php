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

    /**
     * @ORM\OneToMany(targetEntity=PlanCommunication::class, mappedBy="site")
     */
    private $planCommunications;

    /**
     * @ORM\OneToMany(targetEntity=Rig::class, mappedBy="site")
     */
    private $rigs;

    /**
     * @ORM\OneToMany(targetEntity=Pass::class, mappedBy="site")
     */
    private $passes;

    /**
     * @ORM\OneToMany(targetEntity=Satisfaction::class, mappedBy="site")
     */
    private $satisfactions;


    public function __construct()
    {
        $this->cartesCadeauxes = new ArrayCollection();
        $this->cartesCadeaux = new ArrayCollection();
        $this->planCommunications = new ArrayCollection();
        $this->rigs = new ArrayCollection();
        $this->passes = new ArrayCollection();
        $this->satisfactions = new ArrayCollection();
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

    /**
     * @return Collection|PlanCommunication[]
     */
    public function getPlanCommunications(): Collection
    {
        return $this->planCommunications;
    }

    public function addPlanCommunication(PlanCommunication $planCommunication): self
    {
        if (!$this->planCommunications->contains($planCommunication)) {
            $this->planCommunications[] = $planCommunication;
            $planCommunication->setSite($this);
        }

        return $this;
    }

    public function removePlanCommunication(PlanCommunication $planCommunication): self
    {
        if ($this->planCommunications->removeElement($planCommunication)) {
            // set the owning side to null (unless already changed)
            if ($planCommunication->getSite() === $this) {
                $planCommunication->setSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Rig[]
     */
    public function getRigs(): Collection
    {
        return $this->rigs;
    }

    public function addRig(Rig $rig): self
    {
        if (!$this->rigs->contains($rig)) {
            $this->rigs[] = $rig;
            $rig->setSite($this);
        }

        return $this;
    }

    public function removeRig(Rig $rig): self
    {
        if ($this->rigs->removeElement($rig)) {
            // set the owning side to null (unless already changed)
            if ($rig->getSite() === $this) {
                $rig->setSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Pass[]
     */
    public function getPasses(): Collection
    {
        return $this->passes;
    }

    public function addPass(Pass $pass): self
    {
        if (!$this->passes->contains($pass)) {
            $this->passes[] = $pass;
            $pass->setSite($this);
        }

        return $this;
    }

    public function removePass(Pass $pass): self
    {
        if ($this->passes->removeElement($pass)) {
            // set the owning side to null (unless already changed)
            if ($pass->getSite() === $this) {
                $pass->setSite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Satisfaction[]
     */
    public function getSatisfactions(): Collection
    {
        return $this->satisfactions;
    }

    public function addSatisfaction(Satisfaction $satisfaction): self
    {
        if (!$this->satisfactions->contains($satisfaction)) {
            $this->satisfactions[] = $satisfaction;
            $satisfaction->setSite($this);
        }

        return $this;
    }

    public function removeSatisfaction(Satisfaction $satisfaction): self
    {
        if ($this->satisfactions->removeElement($satisfaction)) {
            // set the owning side to null (unless already changed)
            if ($satisfaction->getSite() === $this) {
                $satisfaction->setSite(null);
            }
        }

        return $this;
    }

}
