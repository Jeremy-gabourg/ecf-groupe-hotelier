<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\RoleRepository;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, ManagerRegistry $doctrine, RoleRepository $roleRepository): Response
    {

        $form = $this->createForm(RegistrationFormType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $defaultRole = $roleRepository->find(3);

        $user = new User();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $plainPassword = $data['plainPassword'];
            $hashedPassword = $userPasswordHasher->hashPassword(
                $user,
                $plainPassword
            );
            $user->setPassword($hashedPassword);

            $user->setEmail($data['email']);
            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setUserName($firstName, $lastName);

            $user->setRoleId($defaultRole);

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_login')
//                $userAuthenticator->authenticateUser(
//                $user,
//                $authenticator,
//                $request
//            )
            ;
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }
}
