<?php

namespace App\DataFixtures;

use App\Entity\Faction;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FactionFixtures extends Fixture
{
    public const FACTION_REFERENCE = 'Faction';

    public function load(ObjectManager $manager)
    {
        $arrayFactions = [
            'Space Marine',
            'Nécron',
        ];

        foreach ($arrayFactions as $arrayFaction) {
            $faction = new Faction();
            $faction->setName($arrayFaction);
            $manager->persist($faction);
            $this->addReference(self::FACTION_REFERENCE.'_'.$arrayFaction, $faction);
        }

        $manager->flush();
    }
}
