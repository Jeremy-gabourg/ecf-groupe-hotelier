<?php

namespace App\Twig;

use App\Repository\EstablishmentRepository;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class RenderMainMenu extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction('addEstablishmentsToMenu', [$this->exportEstablishments()])
        ];
    }

    public function exportEstablishments(EstablishmentRepository $establishmentRepository) : array
    {
        $establishments = $establishmentRepository->findAll();

        if(!$establishments){
            throw $this->createNotFoundException(
                'No establishment found'
            );}
        return $establishments;
    }
}