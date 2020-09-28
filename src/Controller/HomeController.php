<?php

namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Social;
use App\Entity\UrPolicy;
use App\Entity\WhoAreUs;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/", name="home_")
 */
class HomeController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route ("", name="index")
     */
    public function index() : Response
    {
        $whoAreUS = $this->getDoctrine()
            ->getRepository(WhoAreUs::class)
            ->findAll();


        $urPolicy = $this->getDoctrine()
            ->getRepository(UrPolicy::class)
            ->findAll();


        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();



        return $this->render('home/index.html.twig', ['whoAreUs' => $whoAreUS,
            'urPolicy' => $urPolicy, 'aSavoir' => $aSavoir, 'social' => $social]);
    }
}
