<?php

namespace App\DataFixtures;

use App\Entity\Figurine;
use App\Enum\TypeOfStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class FigurineFixtures extends Fixture implements DependentFixtureInterface
{
    public const FIGURINE_REFERENCE = 'Figurine';

    public function load(ObjectManager $manager)
    {
        $figurine = new Figurine();
        $manager->persist($figurine);
        $figurine->setName('Guerrier Nécrons');
        $figurine->setImage($this->getReference(ImageFixtures::IMAGE_REFERENCE.'_Guerrier Nécrons'));
        $figurine->setFaction($this->getReference(FactionFixtures::FACTION_REFERENCE.'_Nécron'));
        $figurine->setPoints(110);
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Leadbelcher'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Runelord Brass'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Corax White'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Tesseract Glow'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Nuln Oil'));
        $figurine->setStats($this->getReference(FigurineStatsFixtures::FIGURINESTATS_REFERENCE.'_Guerrier Nécrons'));
        $figurine->addRangedWeapon($this->getReference(GunFixtures::GUN_REFERENCE.'_Écorcheur de Gauss'));
        $figurine->addRangedWeapon($this->getReference(GunFixtures::GUN_REFERENCE.'_Faucheuse Gauss'));
        $figurine->addMeleeWeapon($this->getReference(MeleeWeaponFixtures::MELEE_REFERENCE.'_Arme de combat rapproché (guerriers necrons)'));
        $figurine->setStatus(TypeOfStatus::STOCK);
        $this->addReference(self::FIGURINE_REFERENCE.'_'.$figurine->getName(), $figurine);

        $figurine = new Figurine();
        $manager->persist($figurine);
        $figurine->setName('Destroyers Skorpekh');
        $figurine->setImage($this->getReference(ImageFixtures::IMAGE_REFERENCE.'_Destroyers Skorpekh'));
        $figurine->setFaction($this->getReference(FactionFixtures::FACTION_REFERENCE.'_Nécron'));
        $figurine->setPoints(100);
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Leadbelcher'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Runelord Brass'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Corax White'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Tesseract Glow'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Nuln Oil'));
        $figurine->setStats($this->getReference(FigurineStatsFixtures::FIGURINESTATS_REFERENCE.'_Destroyers Skorpekh'));
        $figurine->addMeleeWeapon($this->getReference(MeleeWeaponFixtures::MELEE_REFERENCE.'_Armes hyperphase de Skorpekh'));
        $figurine->setStatus(TypeOfStatus::PRECOMMANDE);
        $this->addReference(self::FIGURINE_REFERENCE.'_'.$figurine->getName(), $figurine);

        $figurine = new Figurine();
        $manager->persist($figurine);
        $figurine->setName('Destroyers Ophydiens');
        $figurine->setImage($this->getReference(ImageFixtures::IMAGE_REFERENCE.'_Destroyers Ophydiens'));
        $figurine->setFaction($this->getReference(FactionFixtures::FACTION_REFERENCE.'_Nécron'));
        $figurine->setPoints(100);
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Leadbelcher'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Runelord Brass'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Corax White'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Tesseract Glow'));
        $figurine->addPaint($this->getReference(PaintFixtures::PAINT_REFERENCE.'_Nuln Oil'));
        $figurine->setStats($this->getReference(FigurineStatsFixtures::FIGURINESTATS_REFERENCE.'_Destroyers Ophydiens'));
        $figurine->addMeleeWeapon($this->getReference(MeleeWeaponFixtures::MELEE_REFERENCE.'_Armes hyperphases ophydiennes'));
        $figurine->setStatus(TypeOfStatus::HORSTOCK);
        $this->addReference(self::FIGURINE_REFERENCE.'_'.$figurine->getName(), $figurine);

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            ImageFixtures::class,
            FactionFixtures::class,
            PaintFixtures::class,
            FigurineStatsFixtures::class,
            GunFixtures::class,
            MeleeWeaponFixtures::class,
        ];
    }
}
