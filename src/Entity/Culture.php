<?php

namespace App\Entity;

use App\Repository\CultureRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CultureRepository::class)]
class Culture
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateCulture = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTime $dateFin = null;

    #[ORM\Column]
    private ?int $qteRecoltee = null;

    #[ORM\ManyToOne(inversedBy: 'cultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Parcelle $parcelle = null;

    #[ORM\ManyToOne(inversedBy: 'cultures')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Production $production = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCulture(): ?\DateTime
    {
        return $this->dateCulture;
    }

    public function setDateCulture(\DateTime $dateCulture): static
    {
        $this->dateCulture = $dateCulture;

        return $this;
    }

    public function getDateFin(): ?\DateTime
    {
        return $this->dateFin;
    }

    public function setDateFin(\DateTime $dateFin): static
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    public function getQteRecoltee(): ?int
    {
        return $this->qteRecoltee;
    }

    public function setQteRecoltee(int $qteRecoltee): static
    {
        $this->qteRecoltee = $qteRecoltee;

        return $this;
    }

    public function getParcelle(): ?Parcelle
    {
        return $this->parcelle;
    }

    public function setParcelle(?Parcelle $parcelle): static
    {
        $this->parcelle = $parcelle;

        return $this;
    }

    public function getProduction(): ?Production
    {
        return $this->production;
    }

    public function setProduction(?Production $production): static
    {
        $this->production = $production;

        return $this;
    }
}
