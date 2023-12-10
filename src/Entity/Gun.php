<?php

namespace App\Entity;

use App\Repository\GunRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GunRepository::class)]
class Gun
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column]
    private ?int $weaponRange = null;

    #[ORM\Column(length: 255)]
    private ?string $numberOfAttacks = null;

    #[ORM\Column(nullable: true)]
    private ?int $ballisticSkill = null;

    #[ORM\Column]
    private ?int $strenght = null;

    #[ORM\Column]
    private ?int $armorPenetration = null;

    #[ORM\Column(length: 255)]
    private ?string $damage = null;

    #[ORM\ManyToMany(targetEntity: Figurine::class, mappedBy: 'rangedWeapons')]
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

    public function getWeaponRange(): ?int
    {
        return $this->weaponRange;
    }

    public function setWeaponRange(int $weaponRange): static
    {
        $this->weaponRange = $weaponRange;

        return $this;
    }

    public function getNumberOfAttacks(): ?string
    {
        return $this->numberOfAttacks;
    }

    public function setNumberOfAttacks(string $numberOfAttacks): static
    {
        $this->numberOfAttacks = $numberOfAttacks;

        return $this;
    }

    public function getBallisticSkill(): ?int
    {
        return $this->ballisticSkill;
    }

    public function setBallisticSkill(?int $ballisticSkill): static
    {
        $this->ballisticSkill = $ballisticSkill;

        return $this;
    }

    public function getStrenght(): ?int
    {
        return $this->strenght;
    }

    public function setStrenght(int $strenght): static
    {
        $this->strenght = $strenght;

        return $this;
    }

    public function getArmorPenetration(): ?int
    {
        return $this->armorPenetration;
    }

    public function setArmorPenetration(int $armorPenetration): static
    {
        $this->armorPenetration = $armorPenetration;

        return $this;
    }

    public function getDamage(): ?string
    {
        return $this->damage;
    }

    public function setDamage(string $damage): static
    {
        $this->damage = $damage;

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
            $figurine->addRangedWeapon($this);
        }

        return $this;
    }

    public function removeFigurine(Figurine $figurine): static
    {
        if ($this->figurines->removeElement($figurine)) {
            $figurine->removeRangedWeapon($this);
        }

        return $this;
    }
}
