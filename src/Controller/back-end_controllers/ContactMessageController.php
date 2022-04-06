<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactMessageController extends AbstractController
{
    #[Route('/contact/message', name: 'app_contact_message')]
    public function index(): Response
    {
        return $this->render('contact_message/index.html.twig', [
            'controller_name' => 'ContactMessageController',
        ]);
    }
}
