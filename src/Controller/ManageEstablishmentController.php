<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Form\AddEstablishmentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ManageEstablishmentController extends AbstractController
{
    #[Route('/manage_establishment/add', name: 'app_manage_establishment')]
    public function index(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AddEstablishmentType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $establishment = new Establishment();

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $name = $data['establishmentName'];
            $address = $data['address'];
            $city = $data['city'];
            $description = $data['description'];
            $managerId = $data['manager'];

            $establishment->setEstablishmentName($name);
            $establishment->setAddress($address);
            $establishment->setCity($city);
            $establishment->setEstablishmentDescription($description);
            $establishment->setManagerId($managerId);

            $entityManager->persist($establishment);
            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }

        return $this->renderForm('manage_establishment/add_establishment.html.twig', [
            'form' => $form,
        ]);
    }
}
