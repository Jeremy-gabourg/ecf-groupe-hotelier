<?php

namespace App\Controller;

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

        $form = $this->createForm(SearchDisplayType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $search = $form->getData();

            return $this->redirectToRoute('media_add');
        }
        return $this->render('home_page/index.html.twig', [
            'form' => $form,
        ]);
    }
}
