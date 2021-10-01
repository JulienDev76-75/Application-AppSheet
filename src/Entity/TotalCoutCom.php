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
}
