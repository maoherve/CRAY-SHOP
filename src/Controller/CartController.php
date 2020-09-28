<?php

namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Social;
use App\Repository\OutfitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_index")
     */
    public function index(SessionInterface $session, OutfitsRepository $outfitsRepository)
    {

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
        $cart = $session->get('cart', []);

        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'outfit' => $outfitsRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $this->render('cart/index.html.twig', [
            'outfit' => $cartWithData,
            'aSavoir' => $aSavoir,
            'social' => $social
        ]);
    }

    /**
     * @Route("/cart/add/{id}", name="cart_add")
     */
    public function add($id, SessionInterface $session) {

        $cart = $session->get('cart', []);

        if(!empty($cart[$id])) {
            $cart[$id]++;
        }else {
            $cart[$id] = 1;
        }

        $session->set('cart', $cart);

        return $this->redirectToRoute("cart_index");
    }

    /**
     * @Route("/cart/remove/{id}", name="cart_remove")
     */
    public function remove($id, SessionInterface $session) {
        $cart = $session->get('cart', []);

        if(!empty($cart[$id])) {
            unset($cart[$id]);
        }
        $session->set('cart', $cart);

        return $this->redirectToRoute("cart_index");
    }

}
