<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentController extends AbstractController
{
    #[Route('/establishment_{id}', name: 'establishment_homepage')]
    public function index(int $id): Response
    {
        return $this->render('establishment/establishment.html.twig', [
            'controller_name' => 'EstablishmentController',
        ]);
    }
}
