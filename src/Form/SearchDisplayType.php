<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchDisplayType extends AbstractType
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
            ->add('establishment', ChoiceType::class, [
                'label'=>'Etablissement',
                'choices' => [
                    'Etablissement 1'=>1,
                    'Etablissement 2'=>2,
                    'Etablissement 3'=>3,
                    'Etablissement 4'=>4,
                    'Etablissement 5'=>5,
                    'Etablissement 6'=>6,
                    'Etablissement 7'=>7
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
