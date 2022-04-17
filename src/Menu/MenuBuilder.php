<?php

namespace App\Menu;

use App\Repository\EstablishmentRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainSubMenu (ManagerRegistry $doctrine, array $options) : ItemInterface
    {
        $menu = $this->factory->createItem('mySubMenu');

        $repository = $doctrine->getRepository(EstablishmentRepository::class);
        $establishment = $repository->findAll();

        $menu->addChild('Establishments', [
            'route'=>'establishment_homepage',
            'routeParameters'=>['id'=>$establishment->getId()]
        ]);
        return $menu;
    }
}