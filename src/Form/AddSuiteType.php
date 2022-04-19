<?php

namespace App\Form;

use App\Entity\Establishment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddSuiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('establishment', EntityType::class, [
                'label'=>'Hôtel lié',
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'class'=>Establishment::class,
                'choice_label'=>function($establishment){
                    return $establishment->getEstablishmentName(). ' à '.$establishment->getCity();
                },
                'choice_value'=>'id'
            ])
            ->add('suiteTitle', TextType::class, [
                'label'=>'Titre de la suite',
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
            ])
            ->add('price', MoneyType::class, [
                'label'=>'Prix ',
                'currency'=>'EUR',
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'invalid_message'=>'Cette valeur n\'est pas valide',
            ])
            ->add('suiteDescription', TextareaType::class, [
                'label'=>'Description',
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
            ])
            ->add('bookingLink', UrlType::class, [
                'label'=>'Lien Booking',
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Enregistrer la suite',
                'attr'=>[
                    'class'=>'btn btn-outline-primary mt-3'
                ]
            ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
