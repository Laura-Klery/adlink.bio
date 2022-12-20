<?php

namespace App\Form;

use App\Entity\SectionPromotion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionPromotionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('background_promotion')
            ->add('background_card_promotion')
            ->add('color_code')
            ->add('color_description')
            ->add('background_description')
            ->add('customer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPromotion::class,
        ]);
    }
}
