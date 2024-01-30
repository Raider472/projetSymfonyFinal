<?php

namespace App\Form;

use App\Entity\Gun;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GunType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de l'arme de tir",
            ])
            ->add('weaponRange', IntegerType::class, [
                'label' => "Portée de l'arme",
            ])
            ->add('numberOfAttacks', TextType::class, [
                'label' => "Nombre d'attaques",
            ])
            ->add('ballisticSkill', IntegerType::class, [
                'label' => 'Compétence de tir',
            ])
            ->add('strenght', IntegerType::class, [
                'label' => "Force de l'arme",
            ])
            ->add('armorPenetration', IntegerType::class, [
                'label' => "Pénétration de l'arme",
            ])
            ->add('damage', TextType::class, [
                'label' => "Dégats de l'arme",
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gun::class,
        ]);
    }
}
