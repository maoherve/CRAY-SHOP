<?php

namespace App\Controller;

use App\Entity\ASavoir;
use App\Form\ASavoirType;
use App\Repository\ASavoirRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/asavoir", name="a_savoir_")
 */
class ASavoirController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(ASavoirRepository $aSavoirRepository): Response
    {
        return $this->render('admin/a_savoir/index.html.twig', [
            'a_savoirs' => $aSavoirRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $aSavoir = new ASavoir();
        $form = $this->createForm(ASavoirType::class, $aSavoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($aSavoir);
            $entityManager->flush();

            return $this->redirectToRoute('a_savoir_index');
        }

        return $this->render('admin/a_savoir/new.html.twig', [
            'a_savoir' => $aSavoir,
            'form' => $form->createView(),
        ]);
    }



    /**
     * @Route("/{id}/edit", name="edit", methods={"GET","POST"})
     */
    public function edit(Request $request, ASavoir $aSavoir): Response
    {
        $form = $this->createForm(ASavoirType::class, $aSavoir);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('a_savoir_index');
        }

        return $this->render('admin/a_savoir/edit.html.twig', [
            'a_savoir' => $aSavoir,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete(Request $request, ASavoir $aSavoir): Response
    {
        if ($this->isCsrfTokenValid('delete'.$aSavoir->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($aSavoir);
            $entityManager->flush();
        }

        return $this->redirectToRoute('a_savoir_index');
    }
}
