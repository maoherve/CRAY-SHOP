<?php

namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Social;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ASavoirHome", name="ASavoirHome_")
 */
class ASavoirHomeController extends AbstractController
{
    /**
     * @Route("", name="index")
     */
    public function index()
    {
        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();

        return $this->render('footer/La_marque.html.twig', ['aSavoir' => $aSavoir, 'social' => $social]);
    }
}
