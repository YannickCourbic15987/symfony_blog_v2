<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function index(): Response
    {
        return $this->render('pages/inscription/index.html.twig', [
            'controller_name' => 'InscriptionController',
        ]);
    }

    #[Route('/inscription/nouveau', 'inscription.new', methods: ['GET', 'POST'])]
    public function new(
        Request $request,
        EntityManagerInterface $manager
    ): Response {
        $inscription = new Users();
        $form = $this->createForm(RegisterType::class, $inscription);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $inscription = $form->getData();
            // dd($form->getData());

            $manager->persist($inscription);
            $manager->flush();
        }
        return $this->render('/pages/inscription/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
