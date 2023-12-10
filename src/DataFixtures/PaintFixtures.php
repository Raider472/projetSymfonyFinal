<?php

namespace App\DataFixtures;

use App\Entity\Paint;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PaintFixtures extends Fixture
{
    public const PAINT_REFERENCE = 'Paint';

    public function load(ObjectManager $manager)
    {
        $arrayPaints = [
            ['name' => 'Leadbelcher', 'color' => '#808080', 'type' => 'base'],
            ['name' => 'Runelord Brass', 'color' => '#544d1d', 'type' => 'base'],
            ['name' => 'Corax White', 'color' => '#ffffff', 'type' => 'base'],
            ['name' => 'Tesseract Glow', 'color' => '#33cc33', 'type' => 'special'],
            ['name' => 'Nuln Oil', 'color' => '#595959', 'type' => 'shade'],
            ['name' => 'Agrax Earthshade', 'color' => '#793a00', 'type' => 'shade'],
        ];

        foreach ($arrayPaints as $arrayPaint) {
            $paint = new Paint();
            $paint->setName($arrayPaint['name']);
            $paint->setColor($arrayPaint['color']);
            $paint->setType($arrayPaint['type']);
            $manager->persist($paint);
            $this->addReference(self::PAINT_REFERENCE.'_'.$arrayPaint['name'], $paint);
        }

        $manager->flush();
    }
}
