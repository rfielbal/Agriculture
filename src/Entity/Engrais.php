<?php

namespace App\Entity;

use App\Repository\EngraisRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EngraisRepository::class)]
class Engrais
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $nomEngrais = null;

    #[ORM\ManyToOne(inversedBy: 'engrais')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Unite $unite = null;

    /**
     * @var Collection<int, Posseder>
     */
    #[ORM\OneToMany(targetEntity: Posseder::class, mappedBy: 'engrais')]
    private Collection $posseders;

    public function __construct()
    {
        $this->posseders = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomEngrais(): ?string
    {
        return $this->nomEngrais;
    }

    public function setNomEngrais(string $nomEngrais): static
    {
        $this->nomEngrais = $nomEngrais;

        return $this;
    }

    public function getUnite(): ?Unite
    {
        return $this->unite;
    }

    public function setUnite(?Unite $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * @return Collection<int, Posseder>
     */
    public function getPosseders(): Collection
    {
        return $this->posseders;
    }

    public function addPosseder(Posseder $posseder): static
    {
        if (!$this->posseders->contains($posseder)) {
            $this->posseders->add($posseder);
            $posseder->setEngrais($this);
        }

        return $this;
    }

    public function removePosseder(Posseder $posseder): static
    {
        if ($this->posseders->removeElement($posseder)) {
            // set the owning side to null (unless already changed)
            if ($posseder->getEngrais() === $this) {
                $posseder->setEngrais(null);
            }
        }

        return $this;
    }
}
