<?php

namespace App\Menu;

use App\Entity\Establishment;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class MenuBuilder
{
    private $factory;
    private $security;

    public function __construct(FactoryInterface $factory, AuthorizationCheckerInterface $security)
    {
        $this->factory = $factory;
        $this->security = $security;
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