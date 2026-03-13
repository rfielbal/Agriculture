<?php

namespace App\Entity;

use App\Repository\UniteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UniteRepository::class)]
class Unite
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $unite = null;

    /**
     * @var Collection<int, Engrais>
     */
    #[ORM\OneToMany(targetEntity: Engrais::class, mappedBy: 'unite')]
    private Collection $engrais;

    /**
     * @var Collection<int, ElementChimique>
     */
    #[ORM\OneToMany(targetEntity: ElementChimique::class, mappedBy: 'unite', orphanRemoval: true)]
    private Collection $elementChimiques;

    public function __construct()
    {
        $this->engrais = new ArrayCollection();
        $this->elementChimiques = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnite(): ?int
    {
        return $this->unite;
    }

    public function setUnite(int $unite): static
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * @return Collection<int, Engrais>
     */
    public function getEngrais(): Collection
    {
        return $this->engrais;
    }

    public function addEngrai(Engrais $engrai): static
    {
        if (!$this->engrais->contains($engrai)) {
            $this->engrais->add($engrai);
            $engrai->setUnite($this);
        }

        return $this;
    }

    public function removeEngrai(Engrais $engrai): static
    {
        if ($this->engrais->removeElement($engrai)) {
            // set the owning side to null (unless already changed)
            if ($engrai->getUnite() === $this) {
                $engrai->setUnite(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ElementChimique>
     */
    public function getElementChimiques(): Collection
    {
        return $this->elementChimiques;
    }

    public function addElementChimique(ElementChimique $elementChimique): static
    {
        if (!$this->elementChimiques->contains($elementChimique)) {
            $this->elementChimiques->add($elementChimique);
            $elementChimique->setUnite($this);
        }

        return $this;
    }

    public function removeElementChimique(ElementChimique $elementChimique): static
    {
        if ($this->elementChimiques->removeElement($elementChimique)) {
            // set the owning side to null (unless already changed)
            if ($elementChimique->getUnite() === $this) {
                $elementChimique->setUnite(null);
            }
        }

        return $this;
    }
}
