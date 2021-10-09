<?php

namespace App\Entity;

use App\Repository\TotalPassTousSitesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TotalPassTousSitesRepository::class)
 */
class TotalPassTousSites
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_inst;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_abo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $taux_desabo;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total_desabo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $periode;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTotalInst(): ?float
    {
        return $this->total_inst;
    }

    public function setTotalInst(?float $total_inst): self
    {
        $this->total_inst = $total_inst;

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

    public function getTauxDesabo(): ?float
    {
        return $this->taux_desabo;
    }

    public function setTauxDesabo(?float $taux_desabo): self
    {
        $this->taux_desabo = $taux_desabo;

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

    public function getPeriode(): ?string
    {
        return $this->periode;
    }

    public function setPeriode(?string $periode): self
    {
        $this->periode = $periode;

        return $this;
    }
}
