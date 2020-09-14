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
     *
     * @param string $slug The slugger
     * @Route("outfitDetails/{slug<^[a-z0-9-]+$>}", defaults={"slug" = null}, name="Details")
     * @return Response
     */
    public function outfitDetails(?string $slug):Response
    {
        if (!$slug) {
            throw $this
                ->createNotFoundException('No slug has been sent to find a outfit in outfit\'s table.');
        }

        $outfit = $this->getDoctrine()
            ->getRepository(Outfits::class)
            ->findOneBy(['id' => $slug]);
        if (!$outfit) {
            throw $this->createNotFoundException(
                'No program with '.$slug.' title, found in outfit\'s table.'
            );
        }

        return $this->render('outfitsHome/outfit/outfitDetails.html.twig', [
            'outfit' => $outfit,
            'id'  => $slug,
        ]);
    }
}


