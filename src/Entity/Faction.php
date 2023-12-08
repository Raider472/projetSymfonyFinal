<?php

namespace App\Entity;

use App\Repository\FactionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FactionRepository::class)]
class Faction
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'faction', targetEntity: Figurine::class, orphanRemoval: true)]
    private Collection $figurines;

    public function __construct()
    {
        $this->figurines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Figurine>
     */
    public function getFigurines(): Collection
    {
        return $this->figurines;
    }

    public function addFigurine(Figurine $figurine): static
    {
        if (!$this->figurines->contains($figurine)) {
            $this->figurines->add($figurine);
            $figurine->setFaction($this);
        }

        return $this;
    }

    public function removeFigurine(Figurine $figurine): static
    {
        if ($this->figurines->removeElement($figurine)) {
            // set the owning side to null (unless already changed)
            if ($figurine->getFaction() === $this) {
                $figurine->setFaction(null);
            }
        }

        return $this;
    }
}
