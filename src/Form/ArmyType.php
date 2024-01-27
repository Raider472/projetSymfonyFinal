<?php

namespace App\Form\Type;

use App\Entity\Army;
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

class ArmyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de la liste",
            ])
            ->add('figurines', CollectionType::class, [
                'entry_type' => EntityType::class,
                'entry_options'  => [
                    'class' => Figurine::class,
                    'choice_label' => 'name',
                ],
                'label' => 'figurine',
                'allow_add' => true,
                'allow_delete' => true,
                'by_reference' => false,
            ])
            ->add('ajouter', SubmitType::class, [
                'attr' => ['class' => 'save'],
                'label' => 'Créer la liste',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Army::class,
        ]);
    }
}