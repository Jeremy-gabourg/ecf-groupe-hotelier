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

        return $this->render('establishment/establishment.html.twig', [
            'id' => $id,
            'establishment'=>$establishment,
            'establishmentName'=>$establishmentName,
        ]);
    }
}
