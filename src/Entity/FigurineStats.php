<?php

namespace App\Entity;

use App\Repository\FigurineStatsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FigurineStatsRepository::class)]
class FigurineStats
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $movement = null;

    #[ORM\Column]
    private ?int $toughness = null;

    #[ORM\Column]
    private ?int $save = null;

    #[ORM\Column]
    private ?int $wound = null;

    #[ORM\Column]
    private ?int $leadership = null;

    #[ORM\Column]
    private ?int $OC = null;

    #[ORM\Column]
    private ?int $minModel = null;

    #[ORM\Column]
    private ?int $maxModels = null;

    #[ORM\OneToOne(mappedBy: 'stats', cascade: ['persist', 'remove'])]
    private ?Figurine $figurine = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMovement(): ?int
    {
        return $this->movement;
    }

    public function setMovement(int $movement): static
    {
        $this->movement = $movement;

        return $this;
    }

    public function getToughness(): ?int
    {
        return $this->toughness;
    }

    public function setToughness(int $toughness): static
    {
        $this->toughness = $toughness;

        return $this;
    }

    public function getSave(): ?int
    {
        return $this->save;
    }

    public function setSave(int $save): static
    {
        $this->save = $save;

        return $this;
    }

    public function getWound(): ?int
    {
        return $this->wound;
    }

    public function setWound(int $wound): static
    {
        $this->wound = $wound;

        return $this;
    }

    public function getLeadership(): ?int
    {
        return $this->leadership;
    }

    public function setLeadership(int $leadership): static
    {
        $this->leadership = $leadership;

        return $this;
    }

    public function getOC(): ?int
    {
        return $this->OC;
    }

    public function setOC(int $OC): static
    {
        $this->OC = $OC;

        return $this;
    }

    public function getMinModel(): ?int
    {
        return $this->minModel;
    }

    public function setMinModel(int $minModel): static
    {
        $this->minModel = $minModel;

        return $this;
    }

    public function getMaxModels(): ?int
    {
        return $this->maxModels;
    }

    public function setMaxModels(int $maxModels): static
    {
        $this->maxModels = $maxModels;

        return $this;
    }

    public function getFigurine(): ?Figurine
    {
        return $this->figurine;
    }

    public function setFigurine(?Figurine $figurine): static
    {
        // unset the owning side of the relation if necessary
        if (null === $figurine && null !== $this->figurine) {
            $this->figurine->setStats(null);
        }

        // set the owning side of the relation if necessary
        if (null !== $figurine && $figurine->getStats() !== $this) {
            $figurine->setStats($this);
        }

        $this->figurine = $figurine;

        return $this;
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
}
