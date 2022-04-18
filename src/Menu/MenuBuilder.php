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
        $submenu = $this->factory->createItem('mySubMenu');

        $establishments = $establishmentRepository->findAll();

        foreach($establishments as $establishment) {
            $id = $establishment->getId();
            $submenu->addChild('establishment'.$id, [
                'label'=>$establishment->getEstablishmentName().' à '.$establishment->getCity(),
                'route'=>'establishment_homepage',
                'routeParameters'=>['id'=>$id]
            ]);
        }
        return $submenu;
    }
}
