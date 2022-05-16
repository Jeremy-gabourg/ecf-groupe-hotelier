<?php

namespace App\Controller;

use App\Entity\Role;
use App\Entity\User;
use App\Form\LoginType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;


class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, UserPasswordHasherInterface $userPasswordHasher, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);
        dump($form);
        if ($form->isSubmitted() && $form->isValid()) {
            dump('bonjour');
            $data = $form->getData();

            $user = new User();
            $plainPassword = $data['Password'];
            $hashedPassword = $userPasswordHasher->hashPassword(
                $user,
                $plainPassword
            );

            $userRepository = $doctrine->getRepository(User::class);
            $roleRepository = $doctrine->getRepository(Role::class);

            $currentUser = $userRepository->findOneBy([
                'email' => $data['email'],
//                'password' => $hashedPassword,
            ]);

            if (!$currentUser) {
                throw $this->createNotFoundException('Aucun utilisateur avec cette association email / mot de passe');
            } else {

                $roleId = $user->getRoleId();
                $role = $roleRepository->find($roleId);

                $_SESSION['userId'] = $currentUser->getId();
                $_SESSION['userName'] = $currentUser->getUserName();
                $_SESSION['email'] = $currentUser->getEmail();
                $_SESSION['userRole'] = $role->getRoleName();
                $_SESSION['connected'] = 'yes';

                dump($_SESSION);

                return $this->redirectToRoute('home_page');
            }
        }
            return $this->renderForm('security/login.html.twig', [
                'loginForm'=>$form,
            ]);
    }


    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
