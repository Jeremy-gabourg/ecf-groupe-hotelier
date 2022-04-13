<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageUserController extends AbstractController
{
    #[Route('/manage_user/add', name: 'add_user')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();
        $administrator = new User();

        $administrator->setEmail('administrator-hypnos-group@gmail.com');
        $administrator->setFirstName('Jérémy');
        $administrator->setLastName('GABOURG');
        $administrator->setPassword('MotDePasseVisible');

        $entityManager->persist($administrator);
        $entityManager->flush();

        return $this->render('manage_user/manage_user.html.twig', [
            'controller_name' => 'ManageUserController',
        ]);
    }
}
