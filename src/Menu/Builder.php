<?php

namespace App\Menu;

use App\Repository\EstablishmentRepository;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

final class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;

    public function mainSubMenu(FactoryInterface $factory, array $options) : ItemInterface
    {
        $menu = $factory->createItem('mySubMenu');

        $em = $this->container->get('doctrine')->getManager();
        $establishment = $em->getRepository(EstablishmentRepository::class)->findAll();

        $menu->addChild('Establishments', [
            'route'=>'establishment_homepage',
            'routeParameters'=>['id'=>$establishment->getId()]
        ]);
        return $menu;
    }
}