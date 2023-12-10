<?php

namespace App\DataFixtures;

use App\Entity\MeleeWeapon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class MeleeWeaponFixtures extends Fixture
{
    public const MELEE_REFERENCE = 'Melee';

    public function load(ObjectManager $manager)
    {
        $arrayMelees = [
            ['name' => 'Arme de combat rapproché (guerriers necrons)', 'attacks' => 1, 'WS' => 4, 'strength' => 4, 'AP' => 0, 'damage' => 1],
        ];

        foreach ($arrayMelees as $arrayMelee) {
            $melee = new MeleeWeapon();
            $melee->setName($arrayMelee['name']);
            $melee->setNumberOfAttacks($arrayMelee['attacks']);
            $melee->setWeaponSkill($arrayMelee['WS']);
            $melee->setStrenght($arrayMelee['strength']);
            $melee->setArmorPenetration($arrayMelee['AP']);
            $melee->setDamage($arrayMelee['damage']);
            $manager->persist($melee);
            $this->addReference(self::MELEE_REFERENCE.'_'.$arrayMelee['name'], $melee);
        }

        $manager->flush();
    }
}
