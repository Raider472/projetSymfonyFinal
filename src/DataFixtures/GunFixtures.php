<?php

namespace App\DataFixtures;

use App\Entity\Gun;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GunFixtures extends Fixture
{
    public const GUN_REFERENCE = 'Gun';

    public function load(ObjectManager $manager)
    {
        $arrayGuns = [
            ['name' => 'Écorcheur de Gauss', 'range' => 24, 'attacks' => 1, 'BS' => 4, 'strength' => 4, 'AP' => 0, 'damage' => 1],
            ['name' => 'Faucheuse Gauss', 'range' => 12, 'attacks' => 2, 'BS' => 4, 'strength' => 5, 'AP' => -1, 'damage' => 1],
        ];

        foreach ($arrayGuns as $arraygun) {
            $gun = new Gun();
            $gun->setName($arraygun['name']);
            $gun->setWeaponRange($arraygun['range']);
            $gun->setNumberOfAttacks($arraygun['attacks']);
            $gun->setBallisticSkill($arraygun['BS']);
            $gun->setStrenght($arraygun['strength']);
            $gun->setArmorPenetration($arraygun['AP']);
            $gun->setDamage($arraygun['damage']);
            $manager->persist($gun);
            $this->addReference(self::GUN_REFERENCE.'_'.$arraygun['name'], $gun);
        }

        $manager->flush();
    }
}
