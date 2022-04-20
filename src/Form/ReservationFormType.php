<?php

namespace App\Form;

use App\Entity\Establishment;
use App\Entity\Suite;
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
            ])
            ->add('departureDate', DateType::class,[
                'label'=>'Départ',
                'widget'=>'single_text',
            ])
            ->add('establishment', EntityType::class, [
                'label'=>'Hôtel',
                'class'=>Establishment::class,
                'choice_label'=>function($establishment){
                    return $establishment->getEstablishmentName(). ' à '.$establishment->getCity();
                },
                'choice_value'=>'id',
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ]
            ])
            ->add('suite', EntityType::class, [
                'label'=>'Suite associée ?',
                'required'=>false,
                'placeholder'=>'Si laissé vide, la gallerie sera rattachée à la page établissement',
                'class'=>Suite::class,
                'choice_label'=>function($suite){
                    return $suite->getTitle().' de '.$suite->getEstablishment();
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
                    'class'=>'btn btn-outline-secondary mt-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
