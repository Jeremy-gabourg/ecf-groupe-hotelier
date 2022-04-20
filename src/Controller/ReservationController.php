<?php

namespace App\Controller;

use App\Entity\TemporarySearch;
use App\Form\ReservationFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $tempSearch = new TemporarySearch();

        $form = $this->createForm(ReservationFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            $arrivalDate = $search['arrivalDate'];
            $departureDate = $search['departureDate'];
            $establishmentId = $search['establishment'];
            $suite = $search['suite'];

            $tempSearch->setArrivalDate($arrivalDate);
            $tempSearch->setDepartureDate($departureDate);
            $tempSearch->setEstablishmentId($establishmentId);
            $tempSearch->setSuiteId($suite);

            $entityManager->persist();
            $entityManager->flush();

            return $this->redirectToRoute('establishment_homepage', [
                'id'=>$establishmentId,
            ]);
        }
        return $this->renderForm('reservation/reservation.html.twig', [
            'reservationForm' => $form,
        ]);
    }
}
