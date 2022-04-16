<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Repository\EstablishmentRepository;
use App\Form\AddEstablishmentType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

class ManageEstablishmentController extends AbstractController
{
    public function renderHotelMenu(EstablishmentRepository $establishmentRepository): Response {
        $establishments = $establishmentRepository->findAll();

        if(!$establishments){
            throw $this->createNotFoundException(
                'No establishment found'
            );}

            return $this->render('base_front.html.twig', [
                    array('establishments'=>$establishments)
                ]
            );
        }


    #[Route('/manage_establishment/add', name: 'app_manage_establishment')]
    public function index(ManagerRegistry $doctrine, Request $request): Response
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

        return $this->renderForm('manage_establishment/manage_establishment.html.twig', [
            'form' => $form,
        ]);
    }
}
