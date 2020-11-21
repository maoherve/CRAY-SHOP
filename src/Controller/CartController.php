<?php

namespace App\Controller;

use App\Entity\ASavoir;
use App\Entity\Social;
use App\Repository\DeclinaisonRepository;
use App\Repository\OutfitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    /**
     * @Route("/cart", name="cart_index")
     * @param SessionInterface $session
     * @param OutfitsRepository $outfitsRepository
     * @param DeclinaisonRepository $declinaisonRepository
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(SessionInterface $session,
                          OutfitsRepository $outfitsRepository,
                          DeclinaisonRepository $declinaisonRepository)
    {

        $aSavoir = $this->getDoctrine()
            ->getRepository(ASavoir::class)
            ->findAll();

        $social = $this->getDoctrine()
            ->getRepository(Social::class)
            ->findAll();

        $cart = $session->get('cart', []);

        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'outfit' => $outfitsRepository->find($id),
                'declinaisons' => $declinaisonRepository,
                'quantity' => $quantity
            ];
        }

        $total = 0;

        foreach ($cartWithData as $item) {
            $totalOutfit = $item['outfit']->getPrice() * $item['quantity'];
            $total += $totalOutfit;
        }

        dd($cartWithData);

        return $this->render('cart/index.html.twig', [
            'outfit' => $cartWithData,
            'aSavoir' => $aSavoir,
            'social' => $social,
            'total' => $total
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
