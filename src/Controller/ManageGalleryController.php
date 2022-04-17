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

            $highlightedPhoto = $data['highlightedPhoto'];
            $extension = $highlightedPhoto->guessExtension();

            $establishment = $data['establishment'];
            $suite = $data['suite'];

            if($suite!==null){
                $path = $this->getParameter('media_directory').'/'.$establishment.'/'.$suite;
            } else {
                $path = $this->getParameter('media_directory').'/'.$establishment;
            }

            if (!$extension) {
                $extension = '.mpeg';
            }
            if ($highlightedPhoto) {
                $originalFilename = pathinfo($highlightedPhoto->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename . '-' . uniqid() . '.' . $extension;
            }
            try {$highlightedPhoto->move($path, $newFilename);}
            catch (FileException $e) {
                echo 'Une erreur est survenue :'.$e->getMessage();
            }

            $files = $data['photos'];

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
                try {$file->move($path, $newFilename);}
                catch (FileException $e) {
                    echo 'Une erreur est survenue :'.$e->getMessage();
                }
            }

            $name = $data['galleryName'];
            $gallery->setEstablishmentId($establishment->getId());
            if($suite!==null){
                $gallery->setSuiteId($suite->getId());
            }
            $gallery->setGalleryName($name);
            $gallery->setPath($path);

            $entityManager->persist($gallery);
            $entityManager->flush();

            return $this->redirectToRoute('home_page');
        }

        return $this->renderForm('manage_gallery/add_gallery.html.twig', [
            'form' => $form,
        ]);
    }
}
