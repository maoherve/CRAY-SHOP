<?php


namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Outfits;
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

        if (!$aSavoir) {
            throw $this->createNotFoundException(
                'No text found in who are us table.'
            );
        }

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();

        if (!$social) {
            throw $this->createNotFoundException(
                'No text found in who are us table.'
            );
        }

        return $this->render('outfitsHome/index.html.twig', ['outfits' => $outfits, 'aSavoir' => $aSavoir, 'social' => $social]);
    }


    /**
     * @Route("/outfitDetails/{id}", name="Details")
     * @return Response
     */
    public function show(int $id): Response
    {
        $outfit = $this->getDoctrine()->getRepository(Outfits::class)->find($id);

        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        if (!$aSavoir) {
            throw $this->createNotFoundException(
                'No text found in who are us table.'
            );
        }

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();

        if (!$social) {
            throw $this->createNotFoundException(
                'No text found in who are us table.'
            );
        }

        return $this->render('outfitsHome/outfit/outfitDetails.html.twig', [
            'outfit' => $outfit, 'aSavoir' => $aSavoir, 'social' => $social]);
    }
}

