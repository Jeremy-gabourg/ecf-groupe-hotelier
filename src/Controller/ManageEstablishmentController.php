<?php

namespace App\Controller;

use App\Entity\Establishment;
use App\Entity\User;
use App\Form\AddEstablishmentType;
use App\Repository\EstablishmentRepository;
use App\Repository\SuiteRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ManageEstablishmentController extends AbstractController
{
    #[Route('/manage_establishment/add', name: 'app_add_establishment')]
    public function addEstablishment(ManagerRegistry $doctrine, Request $request, SluggerInterface $slugger): Response
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

            return $this->redirectToRoute('app_add_establishment');
        }

        return $this->renderForm('manage_establishment/add_establishment.html.twig', [
            'addEstablishmentForm' => $form,
        ]);
    }

    #[Route('/manage_establishment/list', name: 'app_list_establishment')]
    public function listEstablishment(Request $request, EstablishmentRepository $establishmentRepository, SuiteRepository $suiteRepository) : Response
    {
        $establishments = $establishmentRepository->findAll();
        $suites = $suiteRepository->findAll();

//        foreach ($establishments as $establishment){
//            $establishmentName = $establishment->getEstablishmentName();
//            $city = $establishment->getCity();
//            $establishmentManager = $establishment->getManagerId()->getUserName();
//        }
//
//        foreach ($suites as $suite){
//            $suiteTitle = $suite->getTitle();
//            $suitePrice = $suite->getPrice();
//        }
        return $this->render('manage_establishment/list_establishment.html.twig', [
            'establishments'=>$establishments,
            'suites'=>$suites,
//            'establishmentName'=>$establishmentName,
//            'city'=>$city,
//            'establishmentManager'=>$establishmentManager,
//            'suiteTitle'=>$suiteTitle,
//            'suitePrice'=>$suitePrice,
        ])
    ;}

}
