<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Entity\Establishment;
use App\Entity\Suite;
use App\Form\AddGalleryType;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class ManageGalleryController extends AbstractController
{
    #[Route('/manage_gallery/add', name: 'app_manage_gallery')]
    public function index(Request $request, ManagerRegistry $doctrine, SluggerInterface $slugger): Response
    {
        $form = $this->createForm(AddGalleryType::class);
        $form->handleRequest($request);

        $entityManager = $doctrine->getManager();
        $gallery = new Gallery();

        if ($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();

            $establishment = $data['establishment'];
            $suite = $data['suite'];

            if($suite!==null){
                $path = $this->getParameter('media_directory').'/establishments_pages/'.$establishment.'/'.$suite;
            } else {
                $path = $this->getParameter('media_directory').'/establishments_pages/'.$establishment;
            }

            $highlightedPhoto = $form->get('highlightedPhoto')->getData();
            $extension = $highlightedPhoto->guessExtension();

            if (!$extension) {
                $extension = '.mpeg';
            }
            if ($highlightedPhoto) {
                $originalFilename = pathinfo($highlightedPhoto->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = 'HM_' . $safeFilename . '-' . uniqid() . '.' . $extension;
            }
            try {$highlightedPhoto->move($path, $newFilename);}
            catch (FileException $e) {
                echo 'Une erreur est survenue :'.$e->getMessage();
            }

            $files = $form->get('photos')->getData();

            foreach ($files as $file){
                $photoExtension = $file->guessExtension();
                if (!$photoExtension) {
                    $photoExtension = '.mpeg';
                }
                if ($file) {
                    $originalPhotoName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $safePhotoName = $slugger->slug($originalPhotoName);
                    $newPhotoName = $safePhotoName . '-' . uniqid() . '.' . $photoExtension;
                }
                try {$file->move($path, $newPhotoName);}
                catch (FileException $e) {
                    echo 'Une erreur est survenue :'.$e->getMessage();
                }
            }

            $gallery->setEstablishmentId($establishment);
            if($suite!==null){
                $gallery->setSuiteId($suite->getId());
            }

            if($suite!==null){
                $name = 'Gallerie de la '.$suite->getTitle().' de '.$establishment->getEstablishmentName();
            } else {
                $name = 'Gallerie de '.$establishment->getEstablishmentName();
            }
            $gallery->setGalleryName($name);

            $gallery->setPath($path);
            $gallery->setHighlightedPhotoName($newFilename);

            $entityManager->persist($gallery);
            $entityManager->flush();

            return $this->redirectToRoute('app_manage_gallery');
        }

        return $this->renderForm('manage_gallery/add_gallery.html.twig', [
            'addGalleryForm' => $form,
        ]);
    }
}
