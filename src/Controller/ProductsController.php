<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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

}