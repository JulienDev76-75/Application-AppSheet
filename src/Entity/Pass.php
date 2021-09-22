<?php

namespace App\Entity;

use App\Repository\PassRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=PassRepository::class)
 */
class Pass
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periode;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contrat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_fitness_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_fitness_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_fitness_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_fitness_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_fitness_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_fitness_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquatic;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquatic;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquatic;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquatic_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquatic_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquatic_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquatic_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquatic_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquatic_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquaform;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquaform;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquaform;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquaform_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquaform_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquaform_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquaform_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquaform_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquaform_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquaform_plus_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquaform_plus_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquaform_plus_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_forme;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_forme;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_forme;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_forme_eau;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_forme_eau;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_forme_eau;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_aquabalneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_aquabalneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_aquabalneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_balneo_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_balneo_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_balneo_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_top_forme_balneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_top_forme_balneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_top_forme_balneo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_top_forme_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_top_forme_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_top_forme_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_top_vitalite_fitbain;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_top_vitalite_fitbain;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_top_vitalite_fitbain;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_tonicite;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_desabo_tonicite;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_promo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_promo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_promo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_top_nrj;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_top_nrj;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_top_nrj;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_zen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_zen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_zen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_bien_etre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_bien_etre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_bien_etre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_wellness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_wellness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_wellness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_detente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_detente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_detente;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_liberte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_liberte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_liberte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_liberte_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_liberte_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_liberte_hc;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_liberte_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_liberte_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_liberte_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_liberte_journee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_liberte_journee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_liberte_journee;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_matin;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_junior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_junior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_junior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_senior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_senior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_senior;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_fitness_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_fitness_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_fitness_plus;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_partenaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_partenaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_partenaire;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_sqbb;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_sqbb;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_sqbb;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_gold;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_gold;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_gold;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_bouge_tes_formes;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_bouge_tes_formes;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_bouge_tes_formes;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_option_bienetre_plus_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_option_bienetre_plus_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_option_bienetre_plus_fitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_option_aquagym;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_option_aquagym;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_option_aquagym;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_option_aquafitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_option_aquafitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_option_aquafitness;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $abo_seconde_option;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $desabo_seconde_option;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_seconde_option;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_abo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_desabo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $inst_total;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $taux_desabo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $notes;

    /**
     * @ORM\ManyToOne(targetEntity=Sites::class, inversedBy="passes")
     */
    private $site;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getContrat(): ?string
    {
        return $this->contrat;
    }

    public function setContrat(string $contrat): self
    {
        $this->contrat = $contrat;

        return $this;
    }

    public function getAboFitness(): ?float
    {
        return $this->abo_fitness;
    }

    public function setAboFitness(float $abo_fitness): self
    {
        $this->abo_fitness = $abo_fitness;

        return $this;
    }

    public function getDesaboFitness(): ?float
    {
        return $this->desabo_fitness;
    }

    public function setDesaboFitness(?float $desabo_fitness): self
    {
        $this->desabo_fitness = $desabo_fitness;

        return $this;
    }

    public function getInstFitness(): ?float
    {
        return $this->inst_fitness;
    }

    public function setInstFitness(?float $inst_fitness): self
    {
        $this->inst_fitness = $inst_fitness;

        return $this;
    }

    public function getAboFitnessHc(): ?float
    {
        return $this->abo_fitness_hc;
    }

    public function setAboFitnessHc(?float $abo_fitness_hc): self
    {
        $this->abo_fitness_hc = $abo_fitness_hc;

        return $this;
    }

    public function getDesaboFitnessHc(): ?float
    {
        return $this->desabo_fitness_hc;
    }

    public function setDesaboFitnessHc(?float $desabo_fitness_hc): self
    {
        $this->desabo_fitness_hc = $desabo_fitness_hc;

        return $this;
    }

    public function getInstFitnessHc(): ?float
    {
        return $this->inst_fitness_hc;
    }

    public function setInstFitnessHc(?float $inst_fitness_hc): self
    {
        $this->inst_fitness_hc = $inst_fitness_hc;

        return $this;
    }

    public function getAboFitnessMatin(): ?float
    {
        return $this->abo_fitness_matin;
    }

    public function setAboFitnessMatin(?float $abo_fitness_matin): self
    {
        $this->abo_fitness_matin = $abo_fitness_matin;

        return $this;
    }

    public function getDesaboFitnessMatin(): ?float
    {
        return $this->desabo_fitness_matin;
    }

    public function setDesaboFitnessMatin(?float $desabo_fitness_matin): self
    {
        $this->desabo_fitness_matin = $desabo_fitness_matin;

        return $this;
    }

    public function getInstFitnessMatin(): ?float
    {
        return $this->inst_fitness_matin;
    }

    public function setInstFitnessMatin(?float $inst_fitness_matin): self
    {
        $this->inst_fitness_matin = $inst_fitness_matin;

        return $this;
    }

    public function getAboAquatic(): ?float
    {
        return $this->abo_aquatic;
    }

    public function setAboAquatic(?float $abo_aquatic): self
    {
        $this->abo_aquatic = $abo_aquatic;

        return $this;
    }

    public function getDesaboAquatic(): ?float
    {
        return $this->desabo_aquatic;
    }

    public function setDesaboAquatic(?float $desabo_aquatic): self
    {
        $this->desabo_aquatic = $desabo_aquatic;

        return $this;
    }

    public function getInstAquatic(): ?float
    {
        return $this->inst_aquatic;
    }

    public function setInstAquatic(?float $inst_aquatic): self
    {
        $this->inst_aquatic = $inst_aquatic;

        return $this;
    }

    public function getAboAquaticHc(): ?float
    {
        return $this->abo_aquatic_hc;
    }

    public function setAboAquaticHc(?float $abo_aquatic_hc): self
    {
        $this->abo_aquatic_hc = $abo_aquatic_hc;

        return $this;
    }

    public function getDesaboAquaticHc(): ?float
    {
        return $this->desabo_aquatic_hc;
    }

    public function setDesaboAquaticHc(?float $desabo_aquatic_hc): self
    {
        $this->desabo_aquatic_hc = $desabo_aquatic_hc;

        return $this;
    }

    public function getInstAquaticHc(): ?float
    {
        return $this->inst_aquatic_hc;
    }

    public function setInstAquaticHc(?float $inst_aquatic_hc): self
    {
        $this->inst_aquatic_hc = $inst_aquatic_hc;

        return $this;
    }

    public function getAboAquaticPlus(): ?float
    {
        return $this->abo_aquatic_plus;
    }

    public function setAboAquaticPlus(?float $abo_aquatic_plus): self
    {
        $this->abo_aquatic_plus = $abo_aquatic_plus;

        return $this;
    }

    public function getDesaboAquaticPlus(): ?float
    {
        return $this->desabo_aquatic_plus;
    }

    public function setDesaboAquaticPlus(?float $desabo_aquatic_plus): self
    {
        $this->desabo_aquatic_plus = $desabo_aquatic_plus;

        return $this;
    }

    public function getInstAquaticPlus(): ?float
    {
        return $this->inst_aquatic_plus;
    }

    public function setInstAquaticPlus(?float $inst_aquatic_plus): self
    {
        $this->inst_aquatic_plus = $inst_aquatic_plus;

        return $this;
    }

    public function getAboAquaform(): ?float
    {
        return $this->abo_aquaform;
    }

    public function setAboAquaform(?float $abo_aquaform): self
    {
        $this->abo_aquaform = $abo_aquaform;

        return $this;
    }

    public function getDesaboAquaform(): ?float
    {
        return $this->desabo_aquaform;
    }

    public function setDesaboAquaform(?float $desabo_aquaform): self
    {
        $this->desabo_aquaform = $desabo_aquaform;

        return $this;
    }

    public function getInstAquaform(): ?float
    {
        return $this->inst_aquaform;
    }

    public function setInstAquaform(?float $inst_aquaform): self
    {
        $this->inst_aquaform = $inst_aquaform;

        return $this;
    }

    public function getAboAquaformPlus(): ?float
    {
        return $this->abo_aquaform_plus;
    }

    public function setAboAquaformPlus(?float $abo_aquaform_plus): self
    {
        $this->abo_aquaform_plus = $abo_aquaform_plus;

        return $this;
    }

    public function getDesaboAquaformPlus(): ?float
    {
        return $this->desabo_aquaform_plus;
    }

    public function setDesaboAquaformPlus(?float $desabo_aquaform_plus): self
    {
        $this->desabo_aquaform_plus = $desabo_aquaform_plus;

        return $this;
    }

    public function getInstAquaformPlus(): ?float
    {
        return $this->inst_aquaform_plus;
    }

    public function setInstAquaformPlus(?float $inst_aquaform_plus): self
    {
        $this->inst_aquaform_plus = $inst_aquaform_plus;

        return $this;
    }

    public function getAboAquaformHc(): ?float
    {
        return $this->abo_aquaform_hc;
    }

    public function setAboAquaformHc(?float $abo_aquaform_hc): self
    {
        $this->abo_aquaform_hc = $abo_aquaform_hc;

        return $this;
    }

    public function getDesaboAquaformHc(): ?float
    {
        return $this->desabo_aquaform_hc;
    }

    public function setDesaboAquaformHc(?float $desabo_aquaform_hc): self
    {
        $this->desabo_aquaform_hc = $desabo_aquaform_hc;

        return $this;
    }

    public function getInstAquaformHc(): ?float
    {
        return $this->inst_aquaform_hc;
    }

    public function setInstAquaformHc(?float $inst_aquaform_hc): self
    {
        $this->inst_aquaform_hc = $inst_aquaform_hc;

        return $this;
    }

    public function getAboAquaformPlusHc(): ?float
    {
        return $this->abo_aquaform_plus_hc;
    }

    public function setAboAquaformPlusHc(?float $abo_aquaform_plus_hc): self
    {
        $this->abo_aquaform_plus_hc = $abo_aquaform_plus_hc;

        return $this;
    }

    public function getDesaboAquaformPlusHc(): ?float
    {
        return $this->desabo_aquaform_plus_hc;
    }

    public function setDesaboAquaformPlusHc(?float $desabo_aquaform_plus_hc): self
    {
        $this->desabo_aquaform_plus_hc = $desabo_aquaform_plus_hc;

        return $this;
    }

    public function getInstAquaformPlusHc(): ?float
    {
        return $this->inst_aquaform_plus_hc;
    }

    public function setInstAquaformPlusHc(?float $inst_aquaform_plus_hc): self
    {
        $this->inst_aquaform_plus_hc = $inst_aquaform_plus_hc;

        return $this;
    }

    public function getAboForme(): ?float
    {
        return $this->abo_forme;
    }

    public function setAboForme(?float $abo_forme): self
    {
        $this->abo_forme = $abo_forme;

        return $this;
    }

    public function getDesaboForme(): ?float
    {
        return $this->desabo_forme;
    }

    public function setDesaboForme(?float $desabo_forme): self
    {
        $this->desabo_forme = $desabo_forme;

        return $this;
    }

    public function getInstForme(): ?float
    {
        return $this->inst_forme;
    }

    public function setInstForme(?float $inst_forme): self
    {
        $this->inst_forme = $inst_forme;

        return $this;
    }

    public function getAboFormeEau(): ?float
    {
        return $this->abo_forme_eau;
    }

    public function setAboFormeEau(?float $abo_forme_eau): self
    {
        $this->abo_forme_eau = $abo_forme_eau;

        return $this;
    }

    public function getDesaboFormeEau(): ?float
    {
        return $this->desabo_forme_eau;
    }

    public function setDesaboFormeEau(?float $desabo_forme_eau): self
    {
        $this->desabo_forme_eau = $desabo_forme_eau;

        return $this;
    }

    public function getInstFormeEau(): ?float
    {
        return $this->inst_forme_eau;
    }

    public function setInstFormeEau(?float $inst_forme_eau): self
    {
        $this->inst_forme_eau = $inst_forme_eau;

        return $this;
    }

    public function getAboAquabalneo(): ?float
    {
        return $this->abo_aquabalneo;
    }

    public function setAboAquabalneo(?float $abo_aquabalneo): self
    {
        $this->abo_aquabalneo = $abo_aquabalneo;

        return $this;
    }

    public function getDesaboAquabalneo(): ?float
    {
        return $this->desabo_aquabalneo;
    }

    public function setDesaboAquabalneo(?float $desabo_aquabalneo): self
    {
        $this->desabo_aquabalneo = $desabo_aquabalneo;

        return $this;
    }

    public function getInstAquabalneo(): ?float
    {
        return $this->inst_aquabalneo;
    }

    public function setInstAquabalneo(?float $inst_aquabalneo): self
    {
        $this->inst_aquabalneo = $inst_aquabalneo;

        return $this;
    }

    public function getAboBalneoFitness(): ?float
    {
        return $this->abo_balneo_fitness;
    }

    public function setAboBalneoFitness(?float $abo_balneo_fitness): self
    {
        $this->abo_balneo_fitness = $abo_balneo_fitness;

        return $this;
    }

    public function getDesaboBalneoFitness(): ?float
    {
        return $this->desabo_balneo_fitness;
    }

    public function setDesaboBalneoFitness(?float $desabo_balneo_fitness): self
    {
        $this->desabo_balneo_fitness = $desabo_balneo_fitness;

        return $this;
    }

    public function getInstBalneoFitness(): ?float
    {
        return $this->inst_balneo_fitness;
    }

    public function setInstBalneoFitness(?float $inst_balneo_fitness): self
    {
        $this->inst_balneo_fitness = $inst_balneo_fitness;

        return $this;
    }

    public function getAboTopFormeBalneo(): ?float
    {
        return $this->abo_top_forme_balneo;
    }

    public function setAboTopFormeBalneo(?float $abo_top_forme_balneo): self
    {
        $this->abo_top_forme_balneo = $abo_top_forme_balneo;

        return $this;
    }

    public function getDesaboTopFormeBalneo(): ?float
    {
        return $this->desabo_top_forme_balneo;
    }

    public function setDesaboTopFormeBalneo(?float $desabo_top_forme_balneo): self
    {
        $this->desabo_top_forme_balneo = $desabo_top_forme_balneo;

        return $this;
    }

    public function getInstTopFormeBalneo(): ?float
    {
        return $this->inst_top_forme_balneo;
    }

    public function setInstTopFormeBalneo(?float $inst_top_forme_balneo): self
    {
        $this->inst_top_forme_balneo = $inst_top_forme_balneo;

        return $this;
    }

    public function getAboTopFormeFitness(): ?float
    {
        return $this->abo_top_forme_fitness;
    }

    public function setAboTopFormeFitness(?float $abo_top_forme_fitness): self
    {
        $this->abo_top_forme_fitness = $abo_top_forme_fitness;

        return $this;
    }

    public function getDesaboTopFormeFitness(): ?float
    {
        return $this->desabo_top_forme_fitness;
    }

    public function setDesaboTopFormeFitness(?float $desabo_top_forme_fitness): self
    {
        $this->desabo_top_forme_fitness = $desabo_top_forme_fitness;

        return $this;
    }

    public function getInstTopFormeFitness(): ?float
    {
        return $this->inst_top_forme_fitness;
    }

    public function setInstTopFormeFitness(?float $inst_top_forme_fitness): self
    {
        $this->inst_top_forme_fitness = $inst_top_forme_fitness;

        return $this;
    }

    public function getAboTopVitaliteFitbain(): ?float
    {
        return $this->abo_top_vitalite_fitbain;
    }

    public function setAboTopVitaliteFitbain(?float $abo_top_vitalite_fitbain): self
    {
        $this->abo_top_vitalite_fitbain = $abo_top_vitalite_fitbain;

        return $this;
    }

    public function getDesaboTopVitaliteFitbain(): ?float
    {
        return $this->desabo_top_vitalite_fitbain;
    }

    public function setDesaboTopVitaliteFitbain(?float $desabo_top_vitalite_fitbain): self
    {
        $this->desabo_top_vitalite_fitbain = $desabo_top_vitalite_fitbain;

        return $this;
    }

    public function getInstTopVitaliteFitbain(): ?float
    {
        return $this->inst_top_vitalite_fitbain;
    }

    public function setInstTopVitaliteFitbain(?float $inst_top_vitalite_fitbain): self
    {
        $this->inst_top_vitalite_fitbain = $inst_top_vitalite_fitbain;

        return $this;
    }

    public function getAboTonicite(): ?float
    {
        return $this->abo_tonicite;
    }

    public function setAboTonicite(float $abo_tonicite): self
    {
        $this->abo_tonicite = $abo_tonicite;

        return $this;
    }

    public function getInstDesaboTonicite(): ?float
    {
        return $this->inst_desabo_tonicite;
    }

    public function setInstDesaboTonicite(?float $inst_desabo_tonicite): self
    {
        $this->inst_desabo_tonicite = $inst_desabo_tonicite;

        return $this;
    }

    public function getAboPromo(): ?float
    {
        return $this->abo_promo;
    }

    public function setAboPromo(?float $abo_promo): self
    {
        $this->abo_promo = $abo_promo;

        return $this;
    }

    public function getDesaboPromo(): ?float
    {
        return $this->desabo_promo;
    }

    public function setDesaboPromo(?float $desabo_promo): self
    {
        $this->desabo_promo = $desabo_promo;

        return $this;
    }

    public function getInstPromo(): ?float
    {
        return $this->inst_promo;
    }

    public function setInstPromo(?float $inst_promo): self
    {
        $this->inst_promo = $inst_promo;

        return $this;
    }

    public function getAboHc(): ?float
    {
        return $this->abo_hc;
    }

    public function setAboHc(?float $abo_hc): self
    {
        $this->abo_hc = $abo_hc;

        return $this;
    }

    public function getDesaboHc(): ?float
    {
        return $this->desabo_hc;
    }

    public function setDesaboHc(?float $desabo_hc): self    
    {
        $this->desabo_hc = $desabo_hc;

        return $this;
    }

    public function getInstHc(): ?float
    {
        return $this->inst_hc;
    }

    public function setInstHc(?float $inst_hc): self
    {
        $this->inst_hc = $inst_hc;

        return $this;
    }

    public function getAboTopNrj(): ?float
    {
        return $this->abo_top_nrj;
    }

    public function setAboTopNrj(?float $abo_top_nrj): self
    {
        $this->abo_top_nrj = $abo_top_nrj;

        return $this;
    }

    public function getDesaboTopNrj(): ?float
    {
        return $this->desabo_top_nrj;
    }

    public function setDesaboTopNrj(?float $desabo_top_nrj): self
    {
        $this->desabo_top_nrj = $desabo_top_nrj;

        return $this;
    }

    public function getInstTopNrj(): ?float
    {
        return $this->inst_top_nrj;
    }

    public function setInstTopNrj(?float $inst_top_nrj): self
    {
        $this->inst_top_nrj = $inst_top_nrj;

        return $this;
    }

    public function getAboZen(): ?float
    {
        return $this->abo_zen;
    }

    public function setAboZen(?float $abo_zen): self
    {
        $this->abo_zen = $abo_zen;

        return $this;
    }

    public function getDesaboZen(): ?float
    {
        return $this->desabo_zen;
    }

    public function setDesaboZen(?float $desabo_zen): self
    {
        $this->desabo_zen = $desabo_zen;

        return $this;
    }

    public function getInstZen(): ?float
    {
        return $this->inst_zen;
    }

    public function setInstZen(?float $inst_zen): self
    {
        $this->inst_zen = $inst_zen;

        return $this;
    }

    public function getAboBienEtre(): ?float
    {
        return $this->abo_bien_etre;
    }

    public function setAboBienEtre(?float $abo_bien_etre): self
    {
        $this->abo_bien_etre = $abo_bien_etre;

        return $this;
    }

    public function getDesaboBienEtre(): ?float
    {
        return $this->desabo_bien_etre;
    }

    public function setDesaboBienEtre(?float $desabo_bien_etre): self
    {
        $this->desabo_bien_etre = $desabo_bien_etre;

        return $this;
    }

    public function getInstBienEtre(): ?float
    {
        return $this->inst_bien_etre;
    }

    public function setInstBienEtre(?float $inst_bien_etre): self
    {
        $this->inst_bien_etre = $inst_bien_etre;

        return $this;
    }

    public function getAboWellness(): ?float
    {
        return $this->abo_wellness;
    }

    public function setAboWellness(?float $abo_wellness): self
    {
        $this->abo_wellness = $abo_wellness;

        return $this;
    }

    public function getDesaboWellness(): ?float
    {
        return $this->desabo_wellness;
    }

    public function setDesaboWellness(?float $desabo_wellness): self
    {
        $this->desabo_wellness = $desabo_wellness;

        return $this;
    }

    public function getInstWellness(): ?float
    {
        return $this->inst_wellness;
    }

    public function setInstWellness(?float $inst_wellness): self
    {
        $this->inst_wellness = $inst_wellness;

        return $this;
    }

    public function getAboDetente(): ?float
    {
        return $this->abo_detente;
    }

    public function setAboDetente(?float $abo_detente): self
    {
        $this->abo_detente = $abo_detente;

        return $this;
    }

    public function getDesaboDetente(): ?float
    {
        return $this->desabo_detente;
    }

    public function setDesaboDetente(?float $desabo_detente): self
    {
        $this->desabo_detente = $desabo_detente;

        return $this;
    }

    public function getInstDetente(): ?float
    {
        return $this->inst_detente;
    }

    public function setInstDetente(?float $inst_detente): self
    {
        $this->inst_detente = $inst_detente;

        return $this;
    }

    public function getAboLiberte(): ?float
    {
        return $this->abo_liberte;
    }

    public function setAboLiberte(?float $abo_liberte): self
    {
        $this->abo_liberte = $abo_liberte;

        return $this;
    }

    public function getDesaboLiberte(): ?float
    {
        return $this->desabo_liberte;
    }

    public function setDesaboLiberte(?float $desabo_liberte): self
    {
        $this->desabo_liberte = $desabo_liberte;

        return $this;
    }

    public function getInstLiberte(): ?float
    {
        return $this->inst_liberte;
    }

    public function setInstLiberte(?float $inst_liberte): self
    {
        $this->inst_liberte = $inst_liberte;

        return $this;
    }

    public function getAboLiberteHc(): ?float
    {
        return $this->abo_liberte_hc;
    }

    public function setAboLiberteHc(?float $abo_liberte_hc): self
    {
        $this->abo_liberte_hc = $abo_liberte_hc;

        return $this;
    }

    public function getDesaboLiberteHc(): ?float
    {
        return $this->desabo_liberte_hc;
    }

    public function setDesaboLiberteHc(?float $desabo_liberte_hc): self
    {
        $this->desabo_liberte_hc = $desabo_liberte_hc;

        return $this;
    }

    public function getInstLiberteHc(): ?float
    {
        return $this->inst_liberte_hc;
    }

    public function setInstLiberteHc(?float $inst_liberte_hc): self
    {
        $this->inst_liberte_hc = $inst_liberte_hc;

        return $this;
    }

    public function getAboLibertePlus(): ?float
    {
        return $this->abo_liberte_plus;
    }

    public function setAboLibertePlus(?float $abo_liberte_plus): self
    {
        $this->abo_liberte_plus = $abo_liberte_plus;

        return $this;
    }

    public function getDesaboLibertePlus(): ?float
    {
        return $this->desabo_liberte_plus;
    }

    public function setDesaboLibertePlus(?float $desabo_liberte_plus): self
    {
        $this->desabo_liberte_plus = $desabo_liberte_plus;

        return $this;
    }

    public function getInstLibertePlus(): ?float
    {
        return $this->inst_liberte_plus;
    }

    public function setInstLibertePlus(?float $inst_liberte_plus): self
    {
        $this->inst_liberte_plus = $inst_liberte_plus;

        return $this;
    }

    public function getAboLiberteJournee(): ?float
    {
        return $this->abo_liberte_journee;
    }

    public function setAboLiberteJournee(?float $abo_liberte_journee): self
    {
        $this->abo_liberte_journee = $abo_liberte_journee;

        return $this;
    }

    public function getDesaboLiberteJournee(): ?float
    {
        return $this->desabo_liberte_journee;
    }

    public function setDesaboLiberteJournee(?float $desabo_liberte_journee): self
    {
        $this->desabo_liberte_journee = $desabo_liberte_journee;

        return $this;
    }

    public function getInstLiberteJournee(): ?float
    {
        return $this->inst_liberte_journee;
    }

    public function setInstLiberteJournee(?float $inst_liberte_journee): self
    {
        $this->inst_liberte_journee = $inst_liberte_journee;

        return $this;
    }

    public function getAboMatin(): ?float
    {
        return $this->abo_matin;
    }

    public function setAboMatin(?float $abo_matin): self
    {
        $this->abo_matin = $abo_matin;

        return $this;
    }

    public function getDesaboMatin(): ?float
    {
        return $this->desabo_matin;
    }

    public function setDesaboMatin(?float $desabo_matin): self
    {
        $this->desabo_matin = $desabo_matin;

        return $this;
    }

    public function getInstMatin(): ?float
    {
        return $this->inst_matin;
    }

    public function setInstMatin(?float $inst_matin): self
    {
        $this->inst_matin = $inst_matin;

        return $this;
    }

    public function getAboJunior(): ?float
    {
        return $this->abo_junior;
    }

    public function setAboJunior(?float $abo_junior): self
    {
        $this->abo_junior = $abo_junior;

        return $this;
    }

    public function getDesaboJunior(): ?float
    {
        return $this->desabo_junior;
    }

    public function setDesaboJunior(?float $desabo_junior): self
    {
        $this->desabo_junior = $desabo_junior;

        return $this;
    }

    public function getInstJunior(): ?float
    {
        return $this->inst_junior;
    }

    public function setInstJunior(?float $inst_junior): self
    {
        $this->inst_junior = $inst_junior;

        return $this;
    }

    public function getAboSenior(): ?float
    {
        return $this->abo_senior;
    }

    public function setAboSenior(?float $abo_senior): self
    {
        $this->abo_senior = $abo_senior;

        return $this;
    }

    public function getDesaboSenior(): ?float
    {
        return $this->desabo_senior;
    }

    public function setDesaboSenior(?float $desabo_senior): self
    {
        $this->desabo_senior = $desabo_senior;

        return $this;
    }

    public function getInstSenior(): ?float
    {
        return $this->inst_senior;
    }

    public function setInstSenior(?float $inst_senior): self
    {
        $this->inst_senior = $inst_senior;

        return $this;
    }

    public function getAboFitnessPlus(): ?float
    {
        return $this->abo_fitness_plus;
    }

    public function setAboFitnessPlus(?float $abo_fitness_plus): self
    {
        $this->abo_fitness_plus = $abo_fitness_plus;

        return $this;
    }

    public function getDesaboFitnessPlus(): ?float
    {
        return $this->desabo_fitness_plus;
    }

    public function setDesaboFitnessPlus(?float $desabo_fitness_plus): self
    {
        $this->desabo_fitness_plus = $desabo_fitness_plus;

        return $this;
    }

    public function getInstFitnessPlus(): ?float
    {
        return $this->inst_fitness_plus;
    }

    public function setInstFitnessPlus(?float $inst_fitness_plus): self
    {
        $this->inst_fitness_plus = $inst_fitness_plus;

        return $this;
    }

    public function getAboPartenaire(): ?float
    {
        return $this->abo_partenaire;
    }

    public function setAboPartenaire(?float $abo_partenaire): self
    {
        $this->abo_partenaire = $abo_partenaire;

        return $this;
    }

    public function getDesaboPartenaire(): ?float
    {
        return $this->desabo_partenaire;
    }

    public function setDesaboPartenaire(?float $desabo_partenaire): self
    {
        $this->desabo_partenaire = $desabo_partenaire;

        return $this;
    }

    public function getInstPartenaire(): ?float
    {
        return $this->inst_partenaire;
    }

    public function setInstPartenaire(?float $inst_partenaire): self
    {
        $this->inst_partenaire = $inst_partenaire;

        return $this;
    }

    public function getAboSqbb(): ?float
    {
        return $this->abo_sqbb;
    }

    public function setAboSqbb(?float $abo_sqbb): self
    {
        $this->abo_sqbb = $abo_sqbb;

        return $this;
    }

    public function getDesaboSqbb(): ?float
    {
        return $this->desabo_sqbb;
    }

    public function setDesaboSqbb(?float $desabo_sqbb): self
    {
        $this->desabo_sqbb = $desabo_sqbb;

        return $this;
    }

    public function getInstSqbb(): ?float
    {
        return $this->inst_sqbb;
    }

    public function setInstSqbb(?float $inst_sqbb): self
    {
        $this->inst_sqbb = $inst_sqbb;

        return $this;
    }

    public function getAboGold(): ?float
    {
        return $this->abo_gold;
    }

    public function setAboGold(?float $abo_gold): self
    {
        $this->abo_gold = $abo_gold;

        return $this;
    }

    public function getDesaboGold(): ?float
    {
        return $this->desabo_gold;
    }

    public function setDesaboGold(?float $desabo_gold): self
    {
        $this->desabo_gold = $desabo_gold;

        return $this;
    }

    public function getInstGold(): ?float
    {
        return $this->inst_gold;
    }

    public function setInstGold(?float $inst_gold): self
    {
        $this->inst_gold = $inst_gold;

        return $this;
    }

    public function getAboBougeTesFormes(): ?float
    {
        return $this->abo_bouge_tes_formes;
    }

    public function setAboBougeTesFormes(?float $abo_bouge_tes_formes): self
    {
        $this->abo_bouge_tes_formes = $abo_bouge_tes_formes;

        return $this;
    }

    public function getDesaboBougeTesFormes(): ?float
    {
        return $this->desabo_bouge_tes_formes;
    }

    public function setDesaboBougeTesFormes(?float $desabo_bouge_tes_formes): self
    {
        $this->desabo_bouge_tes_formes = $desabo_bouge_tes_formes;

        return $this;
    }

    public function getInstBougeTesFormes(): ?float
    {
        return $this->inst_bouge_tes_formes;
    }

    public function setInstBougeTesFormes(?float $inst_bouge_tes_formes): self
    {
        $this->inst_bouge_tes_formes = $inst_bouge_tes_formes;

        return $this;
    }

    public function getAboOptionBienetrePlusFitness(): ?float
    {
        return $this->abo_option_bienetre_plus_fitness;
    }

    public function setAboOptionBienetrePlusFitness(?float $abo_option_bienetre_plus_fitness): self
    {
        $this->abo_option_bienetre_plus_fitness = $abo_option_bienetre_plus_fitness;

        return $this;
    }

    public function getDesaboOptionBienetrePlusFitness(): ?float
    {
        return $this->desabo_option_bienetre_plus_fitness;
    }

    public function setDesaboOptionBienetrePlusFitness(?float $desabo_option_bienetre_plus_fitness): self
    {
        $this->desabo_option_bienetre_plus_fitness = $desabo_option_bienetre_plus_fitness;

        return $this;
    }

    public function getInstOptionBienetrePlusFitness(): ?float
    {
        return $this->inst_option_bienetre_plus_fitness;
    }

    public function setInstOptionBienetrePlusFitness(?float $inst_option_bienetre_plus_fitness): self
    {
        $this->inst_option_bienetre_plus_fitness = $inst_option_bienetre_plus_fitness;

        return $this;
    }

    public function getAboOptionAquagym(): ?float
    {
        return $this->abo_option_aquagym;
    }

    public function setAboOptionAquagym(?float $abo_option_aquagym): self
    {
        $this->abo_option_aquagym = $abo_option_aquagym;

        return $this;
    }

    public function getDesaboOptionAquagym(): ?float
    {
        return $this->desabo_option_aquagym;
    }

    public function setDesaboOptionAquagym(?float $desabo_option_aquagym): self
    {
        $this->desabo_option_aquagym = $desabo_option_aquagym;

        return $this;
    }

    public function getInstOptionAquagym(): ?float
    {
        return $this->inst_option_aquagym;
    }

    public function setInstOptionAquagym(?float $inst_option_aquagym): self
    {
        $this->inst_option_aquagym = $inst_option_aquagym;

        return $this;
    }

    public function getAboOptionAquafitness(): ?float
    {
        return $this->abo_option_aquafitness;
    }

    public function setAboOptionAquafitness(?float $abo_option_aquafitness): self
    {
        $this->abo_option_aquafitness = $abo_option_aquafitness;

        return $this;
    }

    public function getDesaboOptionAquafitness(): ?float
    {
        return $this->desabo_option_aquafitness;
    }

    public function setDesaboOptionAquafitness(?float $desabo_option_aquafitness): self
    {
        $this->desabo_option_aquafitness = $desabo_option_aquafitness;

        return $this;
    }

    public function getInstOptionAquafitness(): ?float
    {
        return $this->inst_option_aquafitness;
    }

    public function setInstOptionAquafitness(?float $inst_option_aquafitness): self
    {
        $this->inst_option_aquafitness = $inst_option_aquafitness;

        return $this;
    }

    public function getAboSecondeOption(): ?float
    {
        return $this->abo_seconde_option;
    }

    public function setAboSecondeOption(?float $abo_seconde_option): self
    {
        $this->abo_seconde_option = $abo_seconde_option;

        return $this;
    }

    public function getDesaboSecondeOption(): ?float
    {
        return $this->desabo_seconde_option;
    }

    public function setDesaboSecondeOption(?float $desabo_seconde_option): self
    {
        $this->desabo_seconde_option = $desabo_seconde_option;

        return $this;
    }

    public function getInstSecondeOption(): ?float
    {
        return $this->inst_seconde_option;
    }

    public function setInstSecondeOption(?float $inst_seconde_option): self
    {
        $this->inst_seconde_option = $inst_seconde_option;

        return $this;
    }

    public function getTotalAbo(): ?float
    {
        return $this->total_abo;
    }

    public function setTotalAbo(?float $total_abo): self
    {
        $this->total_abo = $total_abo;

        return $this;
    }

    public function getTotalDesabo(): ?float
    {
        return $this->total_desabo;
    }

    public function setTotalDesabo(?float $total_desabo): self
    {
        $this->total_desabo = $total_desabo;

        return $this;
    }

    public function getInstTotal(): ?float
    {
        return $this->inst_total;
    }

    public function setInstTotal(?float $inst_total): self
    {
        $this->inst_total = $inst_total;

        return $this;
    }

    public function getTauxDesabo(): ?float
    {
        return $this->taux_desabo;
    }

    public function setTauxDesabo(?float $taux_desabo): self
    {
        $this->taux_desabo = $taux_desabo;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

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
