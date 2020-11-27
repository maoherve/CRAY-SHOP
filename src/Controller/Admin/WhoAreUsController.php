<?php

namespace App\Controller\Admin;

use App\Entity\WhoAreUs;
use App\Form\WhoAreUsType;
use App\Repository\WhoAreUsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/who/are/us")
 */
class WhoAreUsController extends AbstractController
{
    /**
     * @Route("/", name="who_are_us_index", methods={"GET"})
     */
    public function index(WhoAreUsRepository $whoAreUsRepository): Response
    {
        return $this->render('admin/who_are_us/index.html.twig', [
            'who_areuses' => $whoAreUsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="who_are_us_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $whoAreU = new WhoAreUs();
        $form = $this->createForm(WhoAreUsType::class, $whoAreU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($whoAreU);
            $entityManager->flush();

            return $this->redirectToRoute('who_are_us_index');
        }

        return $this->render('admin/who_are_us/new.html.twig', [
            'who_are_u' => $whoAreU,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="who_are_us_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, WhoAreUs $whoAreU): Response
    {
        $form = $this->createForm(WhoAreUsType::class, $whoAreU);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('who_are_us_index');
        }

        return $this->render('admin/who_are_us/edit.html.twig', [
            'who_are_u' => $whoAreU,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="who_are_us_delete", methods={"DELETE"})
     */
    public function delete(Request $request, WhoAreUs $whoAreU): Response
    {
        if ($this->isCsrfTokenValid('delete'.$whoAreU->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($whoAreU);
            $entityManager->flush();
        }

        return $this->redirectToRoute('who_are_us_index');
    }
}
