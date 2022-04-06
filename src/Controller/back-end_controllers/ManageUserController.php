<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageUserController extends AbstractController
{
    #[Route('/manage/user', name: 'app_manage_user')]
    public function index(): Response
    {
        $administrator = new User();
        $administrator->setEmail('administrator-hypnos-group@gmail.com');
        $administrator->setFirstName('Jérémy');
        $administrator->setLastName('GABOURG');
        $administrator->setPassword('AdminTest007');

        return $this->render('manage_user/index.html.twig', [
            'controller_name' => 'ManageUserController',
        ]);
    }
}
