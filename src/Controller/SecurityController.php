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

class SecurityController extends AbstractController
{
    #[Route(path: '/login', name: 'app_login')]
    public function login(Request $request, UserPasswordHasherInterface $userPasswordHasher, User $userEntity, ManagerRegistry $doctrine): Response
    {
        $form = $this->createForm(LoginType::class);
        $form->handleRequest($request);

        session_start();
        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $plainPassword = $data['password'];
            $hashedPassword = $userPasswordHasher->hashPassword(
                $userEntity,
                $plainPassword
            );

            $userRepository = $doctrine->getRepository(User::class);
            $roleRepository = $doctrine->getRepository(Role::class);

            $user = $userRepository->findOneBy([
                'email' => $data['email'],
                'password' => $hashedPassword,
            ]);

            if ($user !== null) {
                $role = $roleRepository->find($user->getRoleId());

                $_SESSION['userId'] = $user->getId();
                $_SESSION['userName'] = $user->getUserName();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['userRole'] = $role->getRoleName();
                $_SESSION['connected'] = 'yes';

                return $this->redirectToRoute('home_page');
            }
        }
            return $this->render('security/login.html.twig',
                ['authenticationError'=>'Mauvais mot de passe ou mauvais email. Veuillez réessayer svp.',]
            );
    }


    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
