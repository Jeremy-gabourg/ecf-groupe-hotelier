<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageEstablishmentController extends AbstractController
{
    #[Route('/manage/establishment', name: 'app_manage_establishment')]
    public function index(): Response
    {
        return $this->render('manage_establishment/index.html.twig', [
            'controller_name' => 'ManageEstablishmentController',
        ]);
    }
}
