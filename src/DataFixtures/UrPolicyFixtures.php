<?php

namespace App\DataFixtures;

use App\Entity\UrPolicy;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UrPolicyFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $urPolicy = new UrPolicy();
        $urPolicy->setTitle('Conditions');
        $urPolicy->setText('Les conditions sont les suivantes :');

        $manager->persist($urPolicy);
        $manager->flush();
    }
}
