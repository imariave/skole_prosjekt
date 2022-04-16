<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

use App\Repository\ProduktRepository;


class ProductsController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage(ProduktRepository $repo): Response
    {
        $bikes = $repo->findBy([]);
        return $this->render('homepage.html.twig', [
            'bikes' => $bikes
        ]);

    }

    /**
     * @Route("/produkt/{id}")
     */

    public function details($id, Request $request, ProduktRepository $repo, SessionInterface $session): Response
    {
        $bike = $repo->find($id);

        if ($bike === null){
            throw $this->createNotFoundException('Beklager, produktet eksisterer ikke lenger');
        }

        //lagt inn til kurven handling
        $basket = $session->get('basket', []);

        if ($request->isMethod('POST')) {
            $basket[$bike->getId()] = $bike;
            $session->set('basket', $basket);
        }
        $isInBasket = array_key_exists($bike->getId(),$basket);

        return $this->render('details.html.twig', [
            'bike' => $bike,
            'inBasket' => $isInBasket
        ]);
    }

}