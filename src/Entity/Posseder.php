<?php

namespace App\Entity;

use App\Repository\PossederRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PossederRepository::class)]
class Posseder
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'posseders')]
    private ?ElementChimique $element = null;

    #[ORM\ManyToOne(inversedBy: 'posseders')]
    private ?Engrais $engrais = null;

    #[ORM\Column]
    private ?int $valeur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getElement(): ?ElementChimique
    {
        return $this->element;
    }

    public function setElement(?ElementChimique $element): static
    {
        $this->element = $element;

        return $this;
    }

    public function getEngrais(): ?Engrais
    {
        return $this->engrais;
    }

    public function setEngrais(?Engrais $engrais): static
    {
        $this->engrais = $engrais;

        return $this;
    }

    public function getValeur(): ?int
    {
        return $this->valeur;
    }

    public function setValeur(int $valeur): static
    {
        $this->valeur = $valeur;

        return $this;
    }
}
