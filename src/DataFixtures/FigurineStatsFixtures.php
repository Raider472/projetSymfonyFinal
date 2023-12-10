<?php

namespace App\DataFixtures;

use App\Entity\FigurineStats;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class FigurineStatsFixtures extends Fixture
{
    public const FIGURINESTATS_REFERENCE = 'FigurineStats';

    public function load(ObjectManager $manager)
    {
        $arrayStats = [
            ['name' => 'Guerrier Nécrons', 'movement' => 5, 'toughness' => 4, 'save' => 4, 'wound' => 1, 'leadership' => 7, 'OC' => 2, 'minModel' => 10, 'maxModel' => 20],
        ];

        foreach ($arrayStats as $arrayStat) {
            $stats = new FigurineStats();
            $stats->setName($arrayStat['name']);
            $stats->setMovement($arrayStat['movement']);
            $stats->setToughness($arrayStat['toughness']);
            $stats->setSave($arrayStat['save']);
            $stats->setWound($arrayStat['wound']);
            $stats->setLeadership($arrayStat['leadership']);
            $stats->setOC($arrayStat['OC']);
            $stats->setMinModel($arrayStat['minModel']);
            $stats->setMaxModels($arrayStat['maxModel']);
            $manager->persist($stats);
            $this->addReference(self::FIGURINESTATS_REFERENCE.'_'.$arrayStat['name'], $stats);
        }

        $manager->flush();
    }
}
