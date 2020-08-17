<?php

namespace App\Controller;

use App\Entity\Social;
use App\Form\SocialType;
use App\Repository\SocialRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/social")
 */
class SocialController extends AbstractController
{
    /**
     * @Route("/", name="social_index", methods={"GET"})
     */
    public function index(SocialRepository $socialRepository): Response
    {
        return $this->render('social/index.html.twig', [
            'socials' => $socialRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="social_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $social = new Social();
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($social);
            $entityManager->flush();

            return $this->redirectToRoute('social_index');
        }

        return $this->render('social/new.html.twig', [
            'social' => $social,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="social_show", methods={"GET"})
     */
    public function show(Social $social): Response
    {
        return $this->render('social/show.html.twig', [
            'social' => $social,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="social_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Social $social): Response
    {
        $form = $this->createForm(SocialType::class, $social);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('social_index');
        }

        return $this->render('social/edit.html.twig', [
            'social' => $social,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="social_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Social $social): Response
    {
        if ($this->isCsrfTokenValid('delete'.$social->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($social);
            $entityManager->flush();
        }

        return $this->redirectToRoute('social_index');
    }
}
