<?php

namespace App\Controller;

use App\Entity\Users;
use App\Form\RegisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function new(): Response
    {
        $inscription = new Users();
        $form = $this->createForm(RegisterType::class, $inscription);
        return $this->render('pages/inscription/new.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
