<?php


namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Declinaison;
use App\Entity\Outfits;
use App\Entity\Poster;
use App\Entity\Social;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/outfits", name="outfits_")
 */
class OutfitsHomeController extends AbstractController
{
    /**
     * @return Response
     *
     * @Route ("", name="index")
     */
    public function index(): Response
    {

        $outfits = $this->getDoctrine()
            ->getRepository(Outfits::class)
            ->findAll();

        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();


        return $this->render('outfitsHome/index.html.twig', ['outfits' => $outfits, 'aSavoir' => $aSavoir, 'social' => $social]);
    }


    /**
     * @Route("/outfitDetails/{id}", name="Details")
     * @return Response
     */
    public function show(int $id): Response
    {
        $outfit = $this->getDoctrine()
            ->getRepository(Outfits::class)
            ->find($id);


        $declinaisons = $this->getDoctrine()
            ->getRepository(Declinaison::class)
            ->findBy(['outfits' => $outfit]);

        $selectSize = new Declinaison();

        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();


        return $this->render('outfitsHome/outfit/outfitDetails.html.twig', [
            'outfit' => $outfit,
            'declinaisons' => $declinaisons,
            'aSavoir' => $aSavoir,
            'social' => $social,
            'selectSize' => $selectSize,
            ]);
    }
}



