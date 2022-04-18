<?php

namespace App\Form;

use App\Entity\Role;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Doctrine\ORM\EntityRepository;

class AddUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class,[
                'label'=>'Prénom'
            ])
            ->add('lastName', TextType::class,[
                'label'=>'Nom'
            ])
            ->add('email', EmailType::class, [
                'label'=>'Email'
            ])
            ->add('password', TextType::class, [
                'label'=>'Mot de passe temporaire'
            ])
            ->add('role', EntityType::class, [
                'label'=>'Rôle',
                'class'=>Role::class,
                'query_builder'=>function(EntityRepository $er){
                    return $er->createQueryBuilder('r')
                        ->orderBy('r.roleName', 'DESC');
                },
                'choice_label'=>'roleName',
                'choice_value'=>'id',
            ])
            ->add('submit', SubmitType::class, [
            'label'=>'Enregistrer l\'utilisateur',
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
