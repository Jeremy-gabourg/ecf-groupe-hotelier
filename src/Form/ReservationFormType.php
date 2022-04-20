<?php

namespace App\Form;

use App\Entity\Establishment;
use App\Entity\Suite;
use App\Entity\TemporarySearch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ReservationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('arrivalDate', DateType::class,[
                'label'=>'Arrivée',
                'widget'=>'single_text',
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'attr'=>[
                  'class'=>'d-flex'
                ],
            ])
            ->add('departureDate', DateType::class,[
                'label'=>'Départ',
                'widget'=>'single_text',
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'attr'=>[
                    'class'=>'d-flex'
                ],
            ])
//            ->add('establishment', EntityType::class, [
//                'label'=>'Hôtel',
//                'class'=>Establishment::class,
//                'choice_label'=>function($establishment){
//                    return $establishment->getEstablishmentName(). ' à '.$establishment->getCity();
//                },
//                'choice_value'=>'id',
//                'attr'=>[
//                    'class'=>'form-select'
//                ],
//                'label_attr'=>[
//                    'class'=>'form-label pt-3'
//                ]
//            ])
            ->add('suite', EntityType::class, [
                'label'=>'Suite & Hôtel',
                'required'=>false,
                'class'=>Suite::class,
                'choice_label'=>function($suite){
                    return $suite->getTitle().' de '.$suite->getEstablishmentId();
                },
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ]
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Rechercher',
                'attr'=>[
                    'class'=>'btn btn-outline-primary mt-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class'=>TemporarySearch::class,
        ]);
    }
}
