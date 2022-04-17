<?php

namespace App\Menu;

use Symfony\Component\DependencyInjection\ContainerInterface;
use App\Entity\Establishment;
use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

final class Builder implements ContainerAwareInterface
{
    use ContainerAwareTrait;
    /**
     * @inheritDoc
     */
    public function mainSubMenu(FactoryInterface $factory, array $options) : ItemInterface
    {
        $menu = $factory->createItem('root');

        $em = $this->container->get('doctrine')->getManager();
        $establishments = $em->getRepository(Establishment::class)->findAll();
        $menu->addChild('Establishments', [
            'route'=>'establishment_homepage',
            'routeParameters'=>['id'=>$establishments->getId()]
        ]);

        return $menu;
    }
}