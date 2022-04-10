<?php

namespace App\Form;

use App\Entity\Gallery;
use App\Entity\Media;
use App\Repository\GalleryRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('linkedPage', ChoiceType::class, [
                'choices' => [
                    'Aucune'=>null,
                    'Page d\'accueil'=>'Accueil Groupe',
                    'Page de contact'=>'Contact'
                ]
            ])
            ->add('gallery', ChoiceType::class, [
                'choices' => [
                    'Aucune' => null,
                    'Etablissement 1'=>1,
                    'Etablissement 2'=>2,
                    'Etablissement 3'=>3,
                    'Etablissement 4'=>4,
                    'Etablissement 5'=>5,
                    'Etablissement 6'=>6,
                    'Etablissement 7'=>7
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
                            'video/mpeg'
                        ],
                        'mimeTypesMessage' => 'Veuillez sélectionner un fichier dans un des formats acceptés : JPEG, PNG, WEBP, WEBM ou MPEG'
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Media::class,
        ]);
    }
}
