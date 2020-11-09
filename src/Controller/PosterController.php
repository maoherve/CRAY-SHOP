<?php

namespace App\Controller;

use App\Entity\Poster;
use App\Form\PosterType;
use App\Repository\PosterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/poster")
 */
class PosterController extends AbstractController
{
    /**
     * @Route("/", name="poster_index", methods={"GET"})
     */
    public function index(PosterRepository $posterRepository): Response
    {
        return $this->render('admin/poster/index.html.twig', [
            'posters' => $posterRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="poster_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $poster = new Poster();
        $form = $this->createForm(PosterType::class, $poster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($poster);
            $entityManager->flush();

            return $this->redirectToRoute('poster_index');
        }

        return $this->render('admin/poster/new.html.twig', [
            'poster' => $poster,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="poster_show", methods={"GET"})
     */
    public function show(Poster $poster): Response
    {
        return $this->render('poster/show.html.twig', [
            'poster' => $poster,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="poster_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Poster $poster): Response
    {
        $form = $this->createForm(PosterType::class, $poster);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('poster_index');
        }

        return $this->render('admin/poster/edit.html.twig', [
            'poster' => $poster,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}", name="poster_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Poster $poster): Response
    {
        if ($this->isCsrfTokenValid('delete'.$poster->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($poster);
            $entityManager->flush();
        }

        return $this->redirectToRoute('poster_index');
    }
}
