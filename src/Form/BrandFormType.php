<?php

namespace App\Form;

use App\Entity\SectionBrand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BrandFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logo')
            ->add('brand_name')
            ->add('baseline')
            ->add('background_brand')
            ->add('color_brand_name')
            ->add('color_baseline')
            ->add('customer')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionBrand::class,
        ]);
    }
}
