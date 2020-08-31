<?php

namespace App\DataFixtures;

use App\Entity\WhoAreUs;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class WhoAreUsFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $whoAreUs = new WhoAreUs();
        $whoAreUs->setTitle('L\'équipe');
        $whoAreUs->setText('Raphael Szu');

        $manager->persist($whoAreUs);
        $manager->flush();
    }
}
