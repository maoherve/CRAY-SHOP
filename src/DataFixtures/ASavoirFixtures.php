<?php

namespace App\DataFixtures;

use App\Entity\ASavoir;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ASavoirFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 3; $i++) {
            $aSavoir = new ASavoir();
            $aSavoir->setText('Text '.$i);
            $manager->persist($aSavoir);
        }
        $manager->flush();
    }
}
