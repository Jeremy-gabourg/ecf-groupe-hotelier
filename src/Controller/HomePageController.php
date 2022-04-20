<?php

namespace App\Controller;

use App\Entity\TemporarySearch;
use App\Form\SearchDisplayType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $tempSearch = new TemporarySearch();

        $form = $this->createForm(SearchDisplayType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            $arrivalDate = $search['arrivalDate'];
            $departureDate = $search['departureDate'];
            $establishmentId = $search['establishment'];

            $tempSearch->setArrivalDate($arrivalDate);
            $tempSearch->setDepartureDate($departureDate);
            $tempSearch->setEstablishmentId($establishmentId);

            $entityManager->persist();
            $entityManager->flush();

            return $this->redirectToRoute('establishment_homepage', [
                'id'=>$establishmentId,
            ]);
        }
        return $this->renderForm('home_page/index.html.twig', [
            'form' => $form,
        ]);
    }
}
