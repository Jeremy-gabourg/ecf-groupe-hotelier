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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
            ->add('manager', EntityType::class, [
                'label'=>'Manager',
                'class'=>User::class,
                'query_builder'=>function (EntityRepository $er) {
                    return $er->createQueryBuilder('u')
                        ->where(':roleId = u.RoleId')
                        ->setParameter('roleId', '1')
                        ->orderBy('u.userName', 'ASC');
                },
                'choice_label'=>'userName',
                'choice_value'=>'id'
            ])
            ->add('submit', SubmitType::class, [
                'label'=>'Enregistrer l\'établissement',
                'attr'=>[
                    'class'=>'btn btn-outline-primary'
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
