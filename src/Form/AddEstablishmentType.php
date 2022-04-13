<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AddEstablishmentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('establishment_name', TextType::class, [
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
                        ->where('u.Roles = :val')
                        ->setParameter('val', 'ROLE_MANAGER')
                        ->orderBy('u.id', 'ASC')
                        ->getQuery()
                        ->getResult();
                }

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
