<?php

namespace App\Controller;

use App\Entity\Declinaison;
use App\Form\DeclinaisonType;
use App\Entity\Outfits;
use App\Form\OutfitsType;
use App\Repository\OutfitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/adminOutfits", name="admin_")
 */
class OutfitsController extends AbstractController
{
    /**
     * @Route("/", name="outfits_index", methods={"GET"})
     */
    public function index(OutfitsRepository $outfitsRepository): Response
    {
        return $this->render('admin/outfits/index.html.twig', [
            'outfits' => $outfitsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="outfits_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $outfit = new Outfits();
        $form = $this->createForm(OutfitsType::class, $outfit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($outfit);
            $entityManager->flush();

            return $this->redirectToRoute('outfits_index');
        }

        return $this->render('admin/outfits/new.html.twig', [
            'outfit' => $outfit,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="outfits_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Outfits $outfit
     * @return Response
     */
    public function edit(Request $request, Outfits $outfit): Response
    {
        $form = $this->createForm(OutfitsType::class, $outfit);
        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('outfits_index');
        }

        return $this->render('admin/outfits/edit.html.twig', [
            'outfit' => $outfit,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="outfits_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Outfits $outfit): Response
    {
        if ($this->isCsrfTokenValid('delete'.$outfit->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($outfit);
            $entityManager->flush();
        }

        return $this->redirectToRoute('outfits_index');
    }
}
