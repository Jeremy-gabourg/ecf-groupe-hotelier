<?php

namespace App\Controller;

use App\Entity\ContactMessage;
use App\Form\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Repository\UserRepository;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(UserRepository $userRepository, ManagerRegistry $doctrine, Request $request): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $contactMessage = new ContactMessage();

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $firstName = $data['firstName'];
            $lastName = $data['lastName'];
            $email = $data['email'];
            $subject = $data['subject'];
            $message = $data['message'];

            $user = $userRepository->findOneBy([
                'email'=>$email,
            ]);

            if($user !== null){
                $contactMessage->setUserFirstName($user->getFirstName());
                $contactMessage->setUserLastName($user->getLastName());
                $contactMessage->setEmail($email);
                $contactMessage->setSubject($subject);
                $contactMessage->setMessage($message);
                $contactMessage->setUserIsAlreadyClient(true);
                $contactMessage->setUserId($user);
            } else {
                $contactMessage->setUserFirstName(ucfirst(strtolower($firstName)));
                $contactMessage->setUserLastName(strtoupper($lastName));
                $contactMessage->setEmail($email);
                $contactMessage->setSubject($subject);
                $contactMessage->setMessage($message);
                $contactMessage->setUserIsAlreadyClient(false);
            }

            $contactMessage->setIsOpened(false);

            $entityManager->persist($contactMessage);
            $entityManager->flush();

            return $this->redirectToRoute('app_contact');
        }
        return $this->renderForm('contact/contact.html.twig', [
            'contactForm' => $form,
        ]);
    }
}
