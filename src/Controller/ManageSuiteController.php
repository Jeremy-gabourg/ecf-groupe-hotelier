<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageSuiteController extends AbstractController
{
    #[Route('/manage/suite', name: 'app_manage_suite')]
    public function index(): Response
    {
        return $this->render('manage_suite/manage_suite.html.twig', [
            'controller_name' => 'ManageSuiteController',
        ]);
    }
}
