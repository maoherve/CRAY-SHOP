<?php

namespace App\Controller\Admin;

use App\Entity\Declinaison;
use App\Form\DeclinaisonType;
use App\Repository\DeclinaisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/declinaison")
 */
class DeclinaisonController extends AbstractController
{
    /**
     * @Route("/", name="declinaison_index", methods={"GET"})
     */
    public function index(DeclinaisonRepository $declinaisonRepository): Response
    {
        return $this->render('admin/declinaison/index.html.twig', [
            'declinaisons' => $declinaisonRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="declinaison_new", methods={"GET","POST"})
     * @param Request $request
     * @return Response
     */
    public function new(Request $request): Response
    {
        $declinaison = new Declinaison();
        $form = $this->createForm(DeclinaisonType::class, $declinaison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($declinaison);
            $entityManager->flush();

            return $this->redirectToRoute('declinaison_index');
        }
        return $this->render('admin/declinaison/new.html.twig', [
            'declinaison' => $declinaison,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="declinaison_edit", methods={"GET","POST"})
     * @param Request $request
     * @param Declinaison $declinaison
     * @return Response
     */
    public function edit(Request $request, Declinaison $declinaison): Response
    {
        $form = $this->createForm(DeclinaisonType::class, $declinaison);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('declinaison_index');
        }

        return $this->render('admin/declinaison/edit.html.twig', [
            'declinaison' => $declinaison,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="declinaison_delete", methods={"DELETE"})
     * @param Request $request
     * @param Declinaison $declinaison
     * @return Response
     */
    public function delete(Request $request, Declinaison $declinaison): Response
    {
        if ($this->isCsrfTokenValid('delete'.$declinaison->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($declinaison);
            $entityManager->flush();
        }

        return $this->redirectToRoute('declinaison_index');
    }
}
