<?php

namespace App\Controller;

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
        $cart = $session->get('cart', []);

        $cartWithData = [];

        foreach ($cart as $id => $quantity) {
            $cartWithData[] = [
                'outfit' => $outfitsRepository->find($id),
                'quantity' => $quantity
            ];
        }
        return $this->render('cart/index.html.twig', [
            'outfit' => $cartWithData
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

        dd($session->get('cart'));

    }
}
