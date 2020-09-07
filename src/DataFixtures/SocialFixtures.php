<?php

namespace App\DataFixtures;

use App\Entity\Social;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SocialFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
            $social = new Social();
            $social->setFacebook('fb.crayshop.fr');
            $social->setInstagram('instagram.fr/raphael.szu');
            $social->setLinkedin('linked.fr/maoherve');

            $manager->persist($social);
        $manager->flush();
    }
}
