<?php

namespace App\DataFixtures;

use App\Entity\Image;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ImageFixtures extends Fixture
{
    public const IMAGE_REFERENCE = 'Image';

    public function load(ObjectManager $manager)
    {
        $arrayImages = [
            ['name' => 'Guerrier Nécrons', 'path' => 'https://www.warhammer.com/app/resources/catalog/product/920x950/99120110052_NecronWarriorsLead.jpg?fm=webp&w=920&h=948'],
            ['name' => 'Destroyers Skorpekh', 'path' => 'https://www.warhammer.com/app/resources/catalog/product/920x950/99120110051_SkorpekhDestroyersLead.jpg?fm=webp&w=920&h=948'],
            ['name' => 'Destroyers Ophydiens', 'path' => 'https://www.warhammer.com/app/resources/catalog/product/920x950/99120110053_NECOphydianDestroyersLead.jpg?fm=webp&w=920&h=948'],
        ];

        foreach ($arrayImages as $arrayImage) {
            $image = new Image();
            $image->setName($arrayImage['name']);
            $image->setPath($arrayImage['path']);
            $manager->persist($image);
            $this->addReference(self::IMAGE_REFERENCE.'_'.$arrayImage['name'], $image);
        }

        $manager->flush();
    }
}
