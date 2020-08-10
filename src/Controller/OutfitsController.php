<?php


namespace App\Controller;

use App\Entity\Outfits;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class HomeController
 *
 * @Route("/outfits", name="outfits_")
 */
class OutfitsController extends AbstractController
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

        if (!$outfits) {
            throw $this->createNotFoundException(
                'No text found in who are us table.'
            );
        }

        return $this->render('outfits/index.html.twig', ['outfits' => $outfits]);
    }
}
