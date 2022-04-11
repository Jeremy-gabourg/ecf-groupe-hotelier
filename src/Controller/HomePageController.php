<?php

namespace App\Controller;

use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Media;
use App\Entity\Establishment;

class HomePageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $media = $doctrine->getRepository(Media::class)->find(1);

        $mediaEncoded = base64_encode(stream_get_contents($media->getContent()));

        return $this->render('home_page/index.html.twig', [
            'controller_name' => 'HomePageController',
            'media' => $mediaEncoded,
        ]);
    }
}
