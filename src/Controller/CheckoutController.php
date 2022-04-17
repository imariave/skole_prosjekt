<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use App\Entity\Bestilling;
use App\Repository\ProduktRepository;



class CheckoutController extends AbstractController
{


    /**
     * @Route("/checkout")
     */

    public function checkout(Request $request, ProduktRepository $repo, SessionInterface $session): Response
    {
       $basket = $session->get('basket', []);
       $total=array_sum(array_map(function ($produkt) { return $produkt->getPris(); }, $basket));

       $bestilling = new Bestilling();

       $form = $this->createFormBuilder($bestilling)
           ->add('navn', TextType::class)
           ->add('epost', TextType::class)
           ->add('addresse', TextareaType::class)
           ->add('save', SubmitType::class, ['label' => 'Bekreft bestilling'])
           ->getForm();

       $form->handleRequest($request);

       if ($form->isSubmitted() && $form->isValid()) {
           $bestilling = $form->getData();

           foreach ($basket as $produkt) {
               $bestilling->getProducts()->add($repo->find($produkt->getId()));
           }

           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($bestilling);
           $entityManager->flush();

           return $this->render('confirmation.html.twig');
       }

       if ($request->isMethod('POST')) {
           unset($basket[$request->request->get('id')]);
           $session->set('basket', $basket);
       }

        return $this->render('checkout.html.twig', [
            'total' => $total,
            'form' => $form->createView()
        ]);
    }

}