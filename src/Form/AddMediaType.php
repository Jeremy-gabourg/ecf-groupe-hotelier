<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('linkedPage', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Aucune'=>null,
                    'Page d\'accueil'=>'homepage',
                    'Page de contact'=>'contact_page'
                ]
            ])
            ->add('gallery', ChoiceType::class, [
                'mapped' => false,
                'choices' => [
                    'Aucune' => null,
                    'Etablissement 1'=>'gallery_1',
                    'Etablissement 2'=>'gallery_2',
                    'Etablissement 3'=>'gallery_3',
                    'Etablissement 4'=>'gallery_4',
                    'Etablissement 5'=>'gallery_5',
                    'Etablissement 6'=>'gallery_6',
                    'Etablissement 7'=>'gallery_7'
                ]
            ])
            ->add('file', FileType::class, [
                'label' => 'Media (Images ou vidéos)',
                'mapped' => false,
                'required' => false,
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
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
        ]);
    }
}
