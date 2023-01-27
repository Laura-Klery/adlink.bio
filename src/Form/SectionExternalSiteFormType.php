<?php

namespace App\Form;

use App\Entity\SectionExternalSite;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionExternalSiteFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('externalSiteBackground', ColorType::class,
                ['label' => 'Choisissez la couleur de fond pour votre section', 'required' => false])
            ->add('buttonBackground', ColorType::class,
                ['label' => 'Choisissez la couleur de fond des bouttons', 'required' => false])
            ->add('externalSiteLinkColor', ColorType::class,
                ['label' => 'Choisissez la couleur du texte pour votre lien', 'required' => false])
            ->add('enabled', ChoiceType::class, [
                'label' => 'Section visible',
                'choices' => [
                    'Afficher' => true,
                    'Cacher' => false
                ], 'required' => false, 'placeholder' => false
            ])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionExternalSite::class,
        ]);
    }
}
