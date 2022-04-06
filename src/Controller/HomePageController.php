<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Media;
use App\Entity\Establishment;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'app_home_page')]
    public function index(): Response
    {
//        //Entity Manager
//        $em = $this->getDoctrine()->getManager();
//        $establishment = $em->getRepository(Establishment::class)->findOneBy([
//            'name' => 'Group_page'
//        ]);

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
        ]);
    }
}
