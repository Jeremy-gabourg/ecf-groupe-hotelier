<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageReservationController extends AbstractController
{
    #[Route('/manage/reservation', name: 'app_manage_reservation')]
    public function index(): Response
    {
        return $this->render('manage_reservation/manage_reservation.html.twig', [
            'controller_name' => 'ManageReservationController',
        ]);
    }
}
