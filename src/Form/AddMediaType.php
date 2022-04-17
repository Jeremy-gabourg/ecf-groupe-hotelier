<?php

namespace App\Form;

use App\Entity\Gallery;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
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
                'label'=>'Page liée',
                'mapped' => false,
                'choices' => [
                    'Aucune'=>null,
                    'Page d\'accueil'=>'homepage',
                    'Page de réservation'=>'reservation_page',
                    'Page de contact'=>'contact_page',
                ]
            ])
            ->add('gallery', EntityType::class, [
                'label'=>'Gallerie',
                'class'=>Gallery::class,
                'label_choice'=>'galleryName',
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
