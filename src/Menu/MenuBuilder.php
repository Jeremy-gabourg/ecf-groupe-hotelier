<?php

namespace App\Menu;

use App\Repository\EstablishmentRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainSubMenu (RequestStack $requestStack,EstablishmentRepository $establishmentRepository) : ItemInterface
    {
        $menu = $this->factory->createItem('mySubMenu');

        $establishments = $establishmentRepository->findAll();

        foreach($establishments as $establishment) {
            $menu->addChild('establishment', [
                'label'=>$establishment->getEstablishmentName(),
                'route'=>'establishment_homepage',
                'routeParameters'=>['id'=>$establishment->getId()]
            ]);
        }

        return $menu;
    }
}
