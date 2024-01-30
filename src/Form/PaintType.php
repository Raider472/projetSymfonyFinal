<?php

namespace App\Form;

use App\Entity\Paint;
use App\Enum\TypeOfStatus;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EnumType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PaintType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => "Nom de la peinture",
            ])
            ->add('color', TextType::class, [
                'label' => "Couleur de la peinture (en valeur hex: #111111)",
            ])
            ->add('type', ChoiceType::class, [
                'label' => "Type de peinture",
                'choices' => [
                    'Base' => 'Base',
                    'Shade' => 'Shade',
                    'Special' => 'Special',
                    'Contrast' => 'Contrast',
                ],
            ])
            ->add('status', EnumType::class, [
                'class' => TypeOfStatus::class,
                'label' => 'Statut',
            ])
            ->add('ajouter', SubmitType::class, [
                'attr' => ['class' => 'save'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Paint::class,
        ]);
    }
}
