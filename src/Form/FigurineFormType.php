<?php

namespace App\Form\Type;

use App\Entity\Faction;
use App\Enum\TypeOfStatus;
use App\Form\Data\FigurineFormData;
use App\Entity\Figurine;
use App\Entity\Paint;
use App\Form\FigurineStatsType;
use App\Form\GunType;
use App\Form\ImageType;
use App\Form\MeleeWeaponType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FigurineFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de la Figurine',
            ])
            ->add('image', ImageType::class, [
                'label' => false,
            ])
            ->add('faction', EntityType::class, [
                'class' => Faction::class,
                'choice_label' => 'name',
                'label' => 'Faction',
            ])
            ->add('points', IntegerType::class, [
                'label' => 'Nombre de points',
            ])
            ->add('paint', EntityType::class, [
                'class'=> Paint::class,
                'choice_label' => 'name',
                'label' => 'Peintures associées',
                'multiple' => true,
                'expanded' => true,
            ])
            ->add('stats', FigurineStatsType::class, [
                'label' => false,
            ])
            ->add('status', EnumType::class, [
                'class' => TypeOfStatus::class,
                'label' => 'Statut',
            ])
            ->add('rangedWeapons', CollectionType::class, [
                'entry_type' => GunType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_options' => ['label' => false],
            ])
            ->add('meleeWeapons', CollectionType::class, [
                'entry_type' => MeleeWeaponType::class,
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
                'entry_options' => ['label' => false],
            ])
            ->add('ajouter', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Figurine::class,
        ]);
    }
}
