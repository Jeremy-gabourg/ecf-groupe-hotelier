<?php

namespace App\Controller;

use App\Entity\Establishment;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EstablishmentController extends AbstractController
{
    /**
     * @Route(
     *     "/establishment/{id?1}",
     *     name="establishment_homepage",
     *     methods={"GET"},
     *     requirements={"id"="[1-7]"}
     *     )
     */

    public function index(int $id, ManagerRegistry $doctrine): Response
    {
        $entityManager = $doctrine->getManager();

        $establishment = $entityManager->getRepository(Establishment::class)->find($id);

        $establishmentName = $establishment->getEstablishmentName();

        $establishmentDirectory = $this->getParameter('media_directory').'/establishments_pages/'.$establishmentName;
        $establishmentDirectoryForImg = '/ressources/uploads/establishments_pages/'.$establishmentName;

        $pattern = '/^[^HM]/';
        $photos = [];
        $buttons = [];
        $count = 0;
        $count1 = 1;

        if($establishmentDirectory){
            $results = scandir($establishmentDirectory);
            foreach ($results as $value){
                if( $value !== '.'
                    && $value !== '..'
                    && $value !== 'Suite Deluxe'
                    && $value !== 'Suite standard'
                    && $value !== 'Suite VIP'){
                        if ($count === 0) {
                            $button = '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide '. $count1 .'"></button>';
                            $photo = '<div class="carousel-item active"><img src="{{ asset("'.$establishmentDirectoryForImg.'/'.$value.'")}}" class="d-block w-100" alt="Photo de l\'hotel"></div>';
                            array_push($buttons, $button);
                            array_push($photos, $photo);
                            $count++;
                            $count1++;
                        } else {
                            $button = '<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="'.$count.'" aria-label=" Slide '. $count1 .'"></button>';
                            $photo = '<div class="carousel-item"><img src="{{ asset("'.$establishmentDirectoryForImg.'/'.$value.'")}}" class="d-block w-100" alt="Photo de l\'hotel"></div>';
                            array_push($buttons, $button);
                            array_push($photos, $photo);
                            $count++;
                            $count1++;
                        }
                }
            }
        } else {echo 'Le dossier n\'existe pas.';}

        return $this->render('establishment/establishment.html.twig', [
            'id' => $id,
            'establishment'=>$establishment,
            'establishmentName'=>$establishmentName,
            'establishmentDirectory'=>$establishmentDirectory,
            'buttons'=>$buttons,
            'photos'=>$photos,
        ]);
    }
}
