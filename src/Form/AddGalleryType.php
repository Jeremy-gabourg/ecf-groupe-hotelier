<?php

namespace App\Form;

use App\Entity\Establishment;
use App\Entity\Gallery;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\All;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;
use Doctrine\ORM\EntityRepository;

class AddGalleryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
                ->add('establishment', EntityType::class, [
                    'label'=>'Etablissement associé',
                    'class'=>Establishment::class,
                    'choice_label'=>'establishmentName',
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
                    return $suite->getTitle().' de '.$suite->getEstablishmentId();
                },
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ]
                ])
            ->add('highlightedPhoto', FileType::class, [
                'label'=>'Photo ou vidéo mise en avant',
                'mapped'=>false,
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'constraints' => [
                    new File([
                        'maxSize' => '40000k',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/webp',
                            'video/webm',
                            'video/mp4'
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner un fichier dans un des formats acceptés : JPEG, PNG, WEBP, WEBM ou MP4'
                    ])
                ]
            ])
            ->add('photos', FileType::class, [
                'label'=>'Gallerie de photos/vidéos',
                'multiple'=>true,
                'mapped'=>false,
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'constraints' => [
                    new All([
                        new File([
                            'maxSize' => '40000k',
                            'mimeTypes' => [
                                'image/jpeg',
                                'image/png',
                                'image/webp',
                                'video/webm',
                                'video/mp4'
                            ],
                            'mimeTypesMessage' => 'Veuillez sélectionner un fichier dans un des formats acceptés : JPEG, PNG, WEBP, WEBM ou MP4'
                        ])
                    ])
                ]]
            )
        ->add('submit', SubmitType::class, [
                'label'=>'Enregistrer la gallerie',
                'attr'=>[
                    'class'=>'btn btn-outline-primary mt-3'
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'compound'=>true,
        ]);
    }
}
