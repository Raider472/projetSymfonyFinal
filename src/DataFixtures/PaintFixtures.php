<?php

namespace App\DataFixtures;

use App\Entity\Paint;
use App\Enum\TypeOfStatus;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaintFixtures extends Fixture
{
    public const PAINT_REFERENCE = 'Paint';

    public function load(ObjectManager $manager)
    {
        $arrayPaints = [
            ['name' => 'Leadbelcher', 'color' => '#808080', 'type' => 'Base', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Runelord Brass', 'color' => '#544d1d', 'type' => 'Base', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Corax White', 'color' => '#e8e7e3', 'type' => 'Base', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Tesseract Glow', 'color' => '#33cc33', 'type' => 'Special', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Nuln Oil', 'color' => '#595959', 'type' => 'Shade', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Agrax Earthshade', 'color' => '#793a00', 'type' => 'Shade', 'stock' => TypeOfStatus::STOCK],
            ['name' => 'Cool Paint', 'color' => '#793a00', 'type' => 'Shade', 'stock' => TypeOfStatus::HORSTOCK],
        ];

        foreach ($arrayPaints as $arrayPaint) {
            $paint = new Paint();
            $paint->setName($arrayPaint['name']);
            $paint->setColor($arrayPaint['color']);
            $paint->setType($arrayPaint['type']);
            $paint->setStatus($arrayPaint['stock']);
            $manager->persist($paint);
            $this->addReference(self::PAINT_REFERENCE.'_'.$arrayPaint['name'], $paint);
        }

        $manager->flush();
    }
}
