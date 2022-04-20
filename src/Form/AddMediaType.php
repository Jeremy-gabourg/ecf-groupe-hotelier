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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AddMediaType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {

        $builder
            ->add('linkedPage', ChoiceType::class, [
                'label'=>'Page liée',
                'mapped' => false,
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'choices' => [
                    'Aucune'=>null,
                    'Page d\'accueil'=>'homepage',
                    'Page de réservation'=>'reservation_page',
                    'Page nous découvrir'=>'about_us',
                    'Page de contact'=>'contact_page',
                ]
            ])
            ->add('gallery', EntityType::class, [
                'label'=>'Gallerie',
                'attr'=>[
                    'class'=>'form-select'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
                'class'=>Gallery::class,
                'choice_label'=>'galleryName',
                'placeholder'=>'Aucune',
                'required'=>false,
            ])
            ->add('file', FileType::class, [
                'label' => 'Media (Images ou vidéos)',
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label_attr'=>[
                    'class'=>'form-label pt-3'
                ],
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
            ->add('submit', SubmitType::class, [
                'label'=>'Enregistrer le média',
                'attr'=>[
                    'class'=>'btn btn-outline-primary mt-3'
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
