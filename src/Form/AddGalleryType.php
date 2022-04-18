<?php

namespace App\Form;

use App\Entity\Establishment;
use App\Entity\Suite;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ->add('galleryName', TextType::class, [
                'label'=>'Nom'
            ])
            ->add('establishment', EntityType::class, [
                'label'=>'Etablissement associé',
                'class'=>Establishment::class,
                'choice_label'=>'establishmentName',
                'placeholder'=>'Aucun',
                'choice_value'=>'id',
            ])
            ->add('suite', EntityType::class, [
                'label'=>'Suite associée ?',
                'required'=>false,
                'placeholder'=>'Si laissé vide, la gallerie sera rattachée à la page établissement',
                'class'=>Suite::class,
                'query_builder'=>function(EntityRepository $er, $establishmentId){
                    return $er->createQueryBuilder('s')
                        ->where('s.establishementId = :val')
                        ->setParameter('val', $establishmentId)
                        ->orderBy('s.title', 'ASC');
                    },
                ])
            ->add('highlightedPhoto', FileType::class, [
                'label'=>'Photo ou vidéo mise en avant',
                'mapped'=>false,
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
                    'class'=>'btn btn-outline-primary'
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
