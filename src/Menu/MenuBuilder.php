<?php

namespace App\Menu;

use App\Repository\EstablishmentRepository;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainSubMenu (array $options, ManagerRegistry $doctrine) : ItemInterface
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