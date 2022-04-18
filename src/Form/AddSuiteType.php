<?php

namespace App\Form;

use App\Entity\Establishment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Bridge\Doctrine\Form\Type\TextType;
use Symfony\Bridge\Doctrine\Form\Type\MoneyType;
use Symfony\Bridge\Doctrine\Form\Type\TextareaType;
use Symfony\Bridge\Doctrine\Form\Type\UrlType;

class AddSuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('establishment', EntityType::class, [
                'label'=>'Hôtel lié',
                'class'=>Establishment::class,
                'choice_label'=>'establishmentName',
                'choice_value'=>'id'
            ])
            ->add('suiteTitle', TextType::class, [
                'label'=>'Titre de la suite'
            ])
            ->add('price', MoneyType::class, [
                'currency'=>'EUR',
                'invalid_message'=>'Cette valeur n\'est pas valide',
            ])
            ->add('suiteDescription', TextareaType::class, [
                'label'=>'Description',
            ])
            ->add('bookingLink', UrlType::class, [
                'label'=>'Lien Booking',
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
