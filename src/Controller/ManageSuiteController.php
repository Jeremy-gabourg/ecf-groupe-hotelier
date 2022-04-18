<?php

namespace App\Controller;

use App\Entity\Suite;
use App\Form\AddSuiteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;


class ManageSuiteController extends AbstractController
{
    #[Route('/manage_suite/add', name: 'app_manage_suite')]
    public function index(Request $request, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(AddSuiteType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $suite = new Suite();

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $establishmentId = $data['establishment'];
            $title = $data['suiteTitle'];
            $price = $data['price'];
            $description = $data['suiteDescription'];
            $link = $data['bookingLink'];

            $suite->setEstablishmentId($establishmentId);
            $suite->setTitle($title);
            $suite->setPrice($price);
            $suite->setSuiteDescription($description);
            $suite->setLink($link);

            $entityManager->persist($suite);
            $entityManager->flush();

            return $this->redirectToRoute('app_manage_suite');
        }
        return $this->renderForm('manage_suite/add_suite.html.twig', [
            'addSuiteForm' => $form,
        ]);
    }
}
