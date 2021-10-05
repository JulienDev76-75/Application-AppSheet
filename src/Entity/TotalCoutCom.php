<?php

namespace App\Entity;

use App\Repository\TotalCoutComRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalCoutComRepository::class)
 */
class TotalCoutCom
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
    private $cout_totaux;

    /**
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $mois;

    /**
     * @ORM\Column(type="float")
     */
    private $ca_total;

    /**
     * @ORM\Column(type="float")
     */
    private $ca_op_co;

    /**
     * @ORM\Column(type="float")
     */
    private $cout_op_co;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCoutTotaux(): ?float
    {
        return $this->cout_totaux;
    }

    public function setCoutTotaux(float $cout_totaux): self
    {
        $this->cout_totaux = $cout_totaux;

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

    public function getMois(): ?string
    {
        return $this->mois;
    }

    public function setMois(string $mois): self
    {
        $this->mois = $mois;

        return $this;
    }

    public function getCaTotal(): ?float
    {
        return $this->ca_total;
    }

    public function setCaTotal(float $ca_total): self
    {
        $this->ca_total = $ca_total;

        return $this;
    }

    public function getCaOpCo(): ?float
    {
        return $this->ca_op_co;
    }

    public function setCaOpCo(float $ca_op_co): self
    {
        $this->ca_op_co = $ca_op_co;

        return $this;
    }

    public function getCoutOpCo(): ?float
    {
        return $this->cout_op_co;
    }

    public function setCoutOpCo(float $cout_op_co): self
    {
        $this->cout_op_co = $cout_op_co;

        return $this;
    }
}
