<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\All;

class AddEstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('establishmentName', TextType::class, [
                'label'=>'Nom'
            ])
            ->add('address', TextType::class, [
                'label'=>'Adresse'
            ])
            ->add('city', TextType::class, [
                'label'=>'Ville'
            ])
            ->add('description', TextareaType::class, [
                'label'=>'Description'
            ])
            ->add('highlightedPhoto', FileType::class, [
                'label'=>'Photo ou vidéo mise en avant',
                'required' => false,
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
            ->add('gallery', FileType::class, [
                'label'=>'Gallerie de photos/vidéos',
                'multiple'=>true,
                'mapped'=>false,
                'required' => false,
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
            ->add('manager', EntityType::class, [
                'label'=>'Manager',
                'class'=>User::class,
                'query_builder'=>function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where(':role MEMBER OF u.Roles')
                        ->setParameter('role', 'ROLE_MANAGER')
                        ->orderBy('u.userName', 'ASC');
                },
                'choice_label'=>'userName',
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
