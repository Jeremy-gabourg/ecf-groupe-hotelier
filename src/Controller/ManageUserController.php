<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\AddUserType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class ManageUserController extends AbstractController
{
    #[Route('/manage_user/add', name: 'add_user')]
    public function index(ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher, Request $request): Response
    {
        $form = $this->createForm(AddUserType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $user = new User();

        if ($form->isSubmitted() && $form->isValid()){
            $data = $form->getData();

            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $email = $data['email'];
            $plaintextPassword = $data['password'];
            $role = $data['role'];

            $user->setFirstName($firstName);
            $user->setLastName($lastName);
            $user->setEmail($email);
            $user->setUserName($firstName, $lastName);
            $user->addRole($role);

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $plaintextPassword
            );
            $user->setPassword($hashedPassword);
            $user->eraseCredentials();

            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }


        return $this->renderForm('manage_user/manage_user.html.twig', [
            'form' => $form,
        ]);
    }

    #[Route('/manage_user/list', name: 'add_user')]
    public function show(ManagerRegistry $doctrine, UserPasswordHasherInterface $passwordHasher, Request $request): Response
    {
        $form = $this->createForm(AddUserType::class);
        $form->handleRequest($request);
        return $this->renderForm('manage_user/manage_user.html.twig', [
            'form' => $form,
        ]);
    }
}
