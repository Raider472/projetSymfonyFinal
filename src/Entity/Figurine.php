<?php

namespace App\Entity;

use App\Repository\FigurineRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FigurineRepository::class)]
class Figurine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToOne(inversedBy: 'figurine', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Image $image = null;

    #[ORM\ManyToOne(inversedBy: 'figurines')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Faction $faction = null;

    #[ORM\Column]
    private ?int $points = null;

    #[ORM\ManyToMany(targetEntity: Paint::class, inversedBy: 'figurines')]
    private Collection $paint;

    #[ORM\ManyToMany(targetEntity: Army::class, mappedBy: 'figurines')]
    private Collection $armies;

    #[ORM\OneToOne(inversedBy: 'figurine', cascade: ['persist', 'remove'])]
    private ?FigurineStats $stats = null;

    #[ORM\ManyToMany(targetEntity: Gun::class, inversedBy: 'figurines')]
    private Collection $rangedWeapons;

    #[ORM\ManyToMany(targetEntity: MeleeWeapon::class, inversedBy: 'figurines')]
    private Collection $meleeWeapons;

    public function __construct()
    {
        $this->paint = new ArrayCollection();
        $this->armies = new ArrayCollection();
        $this->rangedWeapons = new ArrayCollection();
        $this->meleeWeapons = new ArrayCollection();
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

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(Image $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getFaction(): ?Faction
    {
        return $this->faction;
    }

    public function setFaction(?Faction $faction): static
    {
        $this->faction = $faction;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): static
    {
        $this->points = $points;

        return $this;
    }

    /**
     * @return Collection<int, Paint>
     */
    public function getPaint(): Collection
    {
        return $this->paint;
    }

    public function addPaint(Paint $paint): static
    {
        if (!$this->paint->contains($paint)) {
            $this->paint->add($paint);
        }

        return $this;
    }

    public function removePaint(Paint $paint): static
    {
        $this->paint->removeElement($paint);

        return $this;
    }

    /**
     * @return Collection<int, Army>
     */
    public function getArmies(): Collection
    {
        return $this->armies;
    }

    public function addArmy(Army $army): static
    {
        if (!$this->armies->contains($army)) {
            $this->armies->add($army);
            $army->addFigurine($this);
        }

        return $this;
    }

    public function removeArmy(Army $army): static
    {
        if ($this->armies->removeElement($army)) {
            $army->removeFigurine($this);
        }

        return $this;
    }

    public function getStats(): ?FigurineStats
    {
        return $this->stats;
    }

    public function setStats(?FigurineStats $stats): static
    {
        $this->stats = $stats;

        return $this;
    }

    /**
     * @return Collection<int, Gun>
     */
    public function getRangedWeapons(): Collection
    {
        return $this->rangedWeapons;
    }

    public function addRangedWeapon(Gun $rangedWeapon): static
    {
        if (!$this->rangedWeapons->contains($rangedWeapon)) {
            $this->rangedWeapons->add($rangedWeapon);
        }

        return $this;
    }

    public function removeRangedWeapon(Gun $rangedWeapon): static
    {
        $this->rangedWeapons->removeElement($rangedWeapon);

        return $this;
    }

    /**
     * @return Collection<int, MeleeWeapon>
     */
    public function getMeleeWeapons(): Collection
    {
        return $this->meleeWeapons;
    }

    public function addMeleeWeapon(MeleeWeapon $meleeWeapon): static
    {
        if (!$this->meleeWeapons->contains($meleeWeapon)) {
            $this->meleeWeapons->add($meleeWeapon);
        }

        return $this;
    }

    public function removeMeleeWeapon(MeleeWeapon $meleeWeapon): static
    {
        $this->meleeWeapons->removeElement($meleeWeapon);

        return $this;
    }
}
