<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use App\Entity\Establishment;
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
            ->add('establishment', EntityType::class, [
                'label'=>'Hôtel',
                'class'=>Establishment::class,
                'choice_label'=>'establishmentName',
                'choice_value'=>'id'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
