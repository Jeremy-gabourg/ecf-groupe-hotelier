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
            ->add('arrival_date', DateType::class)
            ->add('departure_date', DateType::class)
            ->add('establishment', ChoiceType::class, [
                'label'=>'Etablissement',
                'choices' => [
                    'Etablissement 1'=>'establishment_1',
                    'Etablissement 2'=>'establishment_2',
                    'Etablissement 3'=>'establishment_3',
                    'Etablissement 4'=>'establishment_4',
                    'Etablissement 5'=>'establishment_5',
                    'Etablissement 6'=>'establishment_6',
                    'Etablissement 7'=>'establishment_7'
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
