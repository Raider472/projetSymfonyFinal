<?php

namespace App\Form;

use App\Entity\FigurineStats;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FigurineStatsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('movement', IntegerType::class, [
                'label' => 'Mouvement',
            ])
            ->add('toughness', IntegerType::class, [
                'label' => 'Endurance',
            ])
            ->add('save', IntegerType::class, [
                'label' => 'Sauvegarde',
            ])
            ->add('wound', IntegerType::class, [
                'label' => 'PV',
            ])
            ->add('leadership', IntegerType::class, [
                'label' => 'Leadership',
            ])
            ->add('OC', IntegerType::class, [
                'label' => 'OC',
            ])
            ->add('minModel', IntegerType::class, [
                'label' => 'Nombre minimum de modèles',
            ])
            ->add('maxModels', IntegerType::class, [
                'label' => 'Nombre maximum de modèles',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => FigurineStats::class,
        ]);
    }
}
