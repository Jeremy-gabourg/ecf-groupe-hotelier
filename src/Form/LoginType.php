<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
            ])
            ->add('Password', PasswordType::class, [
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'label'=>'Mot de passe',
                'attr' => [
                    'class'=>'form-control',
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez rentrer un mot de passe',
                    ]),
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Se connecter',
                'attr'=>[
                    'class'=>'btn btn-primary mt-3',
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
