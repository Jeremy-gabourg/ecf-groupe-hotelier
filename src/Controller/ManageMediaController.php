<?php

namespace App\Controller;

use App\Form\AddMediaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

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
    public function add(Request $request, SluggerInterface $slugger)
    {
//        $entityManager = $doctrine->getManager();
//
//        $media = new Media();
        $form = $this->createForm(AddMediaType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Traitement du fichier
            $file = $form->get('file')->getData();

            $extension = $file->guessExtension();
            if (!$extension) {
                $extension = '.mpeg';
            }

            if ($file) {
                $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
            }

            try {
                $linkedPage = $form->get('linkedPage')->getData();
                $gallery = $form->get('gallery')->getData();

                if($linkedPage!==null && $gallery === null){
                    $file->move(
                        $this->getParameter('media_directory').'/'.$linkedPage,
                        $newFilename
                    );} elseif ($gallery!==null && $linkedPage === null){
                    $file->move(
                        $this->getParameter('media_directory').'/'.$gallery,
                        $newFilename
                    );} else {
                    $file->move(
                        $this->getParameter('media_directory'),
                        $newFilename
                    );}}
            catch (FileException $e) {
                echo 'Une erreur est survenue :'.$e->getMessage();
            }

//            // Traitement du nom de fichier
//            $media->setMediaName($newFilename);
//
//            // Traitement du type de fichier
//            $media->setType($file->getMimeType());
//
//            // Traitement de la taille de fichier
//            $fileSize = $file->getSize();
//            $media->setSize($fileSize);
//
//            // Traitement de l'éventuelles page liée
//            $linkedPage = $form->get('linkedPage')->getData();
//            if($linkedPage !== null){$media->setLinkedPage($linkedPage);}
//
//            // Traitement de l'éventuelle gallery liée
//            $gallery = $form->get('gallery')->getData();
//            if($gallery !== null){$media->setGallery($gallery);}
//
//            $entityManager->persist($media);
//            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }

        return $this->renderForm('manage_media/add_media.html.twig', [
            'form'=>$form,
        ]);
    }
}
