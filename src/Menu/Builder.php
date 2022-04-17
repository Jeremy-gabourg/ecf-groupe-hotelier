<?php

namespace App\Menu;

use App\Repository\EstablishmentRepository;
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

    public function createMainSubMenu (array $options) : ItemInterface
    {
        $menu = $this->factory->createItem('mySubMenu');

        $em = $this->container->get('doctrine')->getManager();
        $establishment = $em->getRepository(EstablishmentRepository::class)->findAll();

        $menu->addChild('Establishments', [
            'route'=>'establishment_homepage',
            'routeParameters'=>['id'=>$establishment->getId()]
        ]);
        return $menu;
    }
}