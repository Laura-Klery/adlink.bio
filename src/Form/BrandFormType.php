<?php

namespace App\Form;

use App\Entity\SectionBrand;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;

class BrandFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('logoFile', VichImageType::class,
                [
                    'label' => 'Ajouter votre logo',
                    'required' => false,
                    'allow_delete' => false,
                    'download_label' => false,
                ])
            ->add('brandName', TextType::class,
                [
                    'label' => 'Ajouter le nom de votre entreprise',
                    'required' => false
                ])
            ->add('baseline', TextareaType::class,
                [
                    'label' => 'Ajouter votre slogan',
                    'required' => false
                ])
            ->add('brandBackground', ColorType::class,
                [
                    'label' => 'Choisissez la couleur de fond pour votre section',
                    'required' => false
                ])
            ->add('brandNameColor', ColorType::class,
                [
                    'label' => 'Choisissez la couleur du texte pour le nom de votre entreprise',
                    'required' => false
                ])
            ->add('brandBaselineColor', ColorType::class,
                [
                    'label' => 'Choisissez la couleur du texte pour votre slogan',
                    'required' => false
                ])
                ->add('enabled', ChoiceType::class,
                    [
                        'label' => 'Section visible',
                        'choices' => ['Afficher' => true,'Cacher' => false,],
                        'required' => false, 'placeholder' => false
                    ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionBrand::class,
        ]);
    }
}
