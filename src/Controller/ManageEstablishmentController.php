<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Entity\User;
use App\Form\AddEstablishmentType;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageEstablishmentController extends AbstractController
{
    #[Route('/manage_establishment/add', name: 'app_manage_establishment')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
    {
        $form = $this->createForm(AddEstablishmentType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();

        $repository = $doctrine->getRepository(User::class);

        $establishment = new Establishment();

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $name = $data['establishmentName'];
            $address = $data['address'];
            $city = $data['city'];
            $description = $data['description'];
            $managerName = $data['manager'];
            $user = $repository->findOneBy($managerName);
            $managerId = $user->getId();

            $establishment->setEstablishmentName($name);
            $establishment->setAddress($address);
            $establishment->setCity($city);
            $establishment->setEstablishmentDescription($description);
            $establishment->setManagerId($managerId);

            $entityManager->persist($establishment);
            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }

        return $this->renderForm('manage_establishment/manage_establishment.html.twig', [
            'form' => $form,
        ]);
    }
}
