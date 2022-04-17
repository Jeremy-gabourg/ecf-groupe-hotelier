<?php

namespace App\Menu;

use App\Entity\Establishment;
use Doctrine\Persistence\ManagerRegistry;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;

class MenuBuilder
{
    private $factory;

    public function __construct(FactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    public function createMainSubMenu (array $options) : ItemInterface
    {
        $menu = $this->factory->createItem('mySubMenu');

        $entityManager = $this->container->get('doctrine')->getManager();
        $establishment = $entityManager->getRepository(Establishment::class)->findAll();

        $menu->addChild('Establishments', [
            'route'=>'establishment_homepage',
            'routeParameters'=>['id'=>$establishment->getId()]
        ]);
        return $menu;
    }
}