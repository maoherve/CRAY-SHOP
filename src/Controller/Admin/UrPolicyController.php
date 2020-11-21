<?php

namespace App\Controller\Admin;

use App\Entity\UrPolicy;
use App\Form\UrPolicyType;
use App\Repository\UrPolicyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/ur/policy")
 */
class UrPolicyController extends AbstractController
{
    /**
     * @Route("/", name="ur_policy_index", methods={"GET"})
     */
    public function index(UrPolicyRepository $urPolicyRepository): Response
    {
        return $this->render('admin/ur_policy/index.html.twig', [
            'ur_policies' => $urPolicyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ur_policy_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $urPolicy = new UrPolicy();
        $form = $this->createForm(UrPolicyType::class, $urPolicy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($urPolicy);
            $entityManager->flush();

            return $this->redirectToRoute('ur_policy_index');
        }

        return $this->render('admin/ur_policy/new.html.twig', [
            'ur_policy' => $urPolicy,
            'form' => $form->createView(),
        ]);
    }


    /**
     * @Route("/{id}/edit", name="ur_policy_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, UrPolicy $urPolicy): Response
    {
        $form = $this->createForm(UrPolicyType::class, $urPolicy);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ur_policy_index');
        }

        return $this->render('admin/ur_policy/edit.html.twig', [
            'ur_policy' => $urPolicy,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ur_policy_delete", methods={"DELETE"})
     */
    public function delete(Request $request, UrPolicy $urPolicy): Response
    {
        if ($this->isCsrfTokenValid('delete'.$urPolicy->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($urPolicy);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ur_policy_index');
    }
}
