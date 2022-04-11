<?php

namespace App\Controller;

use App\Entity\Media;
use App\Form\AddMediaType;
use App\Repository\MediaRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\Response;

class ManageMediaController extends AbstractController
{
//    #[Route('/manage_media/list', name: 'media_list')]
//    public function show(MediaRepository $mediaRepository): Response
//    {
//        $entityManager = $this->getDotrine()->getManager();
//        $repository = $entityManager->getRepository(Media::class);
//
//        $medias = $mediaRepository->findAllWithQB();
//
//        return $this->render('manage_media/add_media.html.twig', [
//            'controller_name' => 'ManageMediaController',
//        ]);
//    }

    #[Route('/manage_media/add', name: 'media_add')]
    public function add(Request $request, SluggerInterface $slugger, MediaRepository $mediaRepository, ManagerRegistry $doctrine)
    {
        $entityManager = $this->getDoctrine()->getManager();

        $media = new Media();
        $form = $this->createForm(AddMediaType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du fichier
            $file = $form->get('file')->getData();

            $extension = $file->guessExtension();
            if (!$extension) {
                $extension = 'bin';
            }

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
            }

            try {
                $media->setContent($file);
                } catch (FileException $e) {
                echo 'Une erreur est survenue :'.$e->getMessage();
            }

            // Traitement du nom de fichier
            $media->setMediaName($newFilename);

            // Traitement de la taille de fichier
            $fileSize = $file->getSize();
            $media->setSize($fileSize);

            // Traitement de l'éventuelles page liée
            $linkedPage = $form->get('linkedPage')->getData();
            if($linkedPage !== null){$media->setLinkedPage($linkedPage);}

            // Traitement de l'éventuelle gallery liée
            $gallery = $form->get('gallery')->getData();
            if($gallery !== null){$media->setGallery($gallery);}

            $entityManager->perist($media);
            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }

        return $this->renderForm('manage_media/add_media.html.twig', [
            'form'=>$form,
        ]);
    }
}
