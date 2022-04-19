<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class ServerConnexionController extends AbstractController
{
    public function someMethod(ManagerRegistry $doctrine) : Response
    {
        $connection = $doctrine->getConnection('suite');
        $result = $connection->fetchAll('SELECT establishment_id_id, id, title  FROM suite');
        exit(json_encode($result));
    }
}
