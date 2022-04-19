<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'label'=>'Prénom',
            ])
            ->add('lastName', TextType::class, [
                'label'=>'Nom',
            ])
            ->add('email', EmailType::class, [
                'label'=>'Email'
            ])
            ->add('subject', ChoiceType::class, [
                'label'=>'Sujet',
                'placeholder'=>'Choisissez un sujet',
                'choices'=>[
                    'Je souhaite poser une réclamation',
                    'Je souhaite commander un service supplémentaire',
                    'Je souhaite en savoir plus sur une suite',
                    'J\'ai un souci avec cette application',
                ]
            ])
            ->add('message', TextareaType::class, [
                'label'=>'Mon message'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Envoyer le message'
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
