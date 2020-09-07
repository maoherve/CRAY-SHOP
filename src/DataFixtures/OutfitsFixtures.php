<?php

namespace App\DataFixtures;

use App\Entity\Outfits;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OutfitsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $outfit = new Outfits();
            $outfit->setName('Produit '.$i);
            $outfit->setPicture('Image '.$i);

            $manager->persist($outfit);
        }
        $manager->flush();
    }
}
