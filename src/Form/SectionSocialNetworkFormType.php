<?php

namespace App\Form;

use App\Entity\SectionSocialNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionSocialNetworkFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sectionSocialNetworkBackground', ColorType::class,
                ['label' => 'Choisissez la couleur de fond de votre section', 'required' => false])
            ->add('socialNetworkIconColor',ColorType::class,
                ['label' => 'Choisissez la couleur des icônes', 'required' => false])
            ->add('enabled', ChoiceType::class, [
                'label' => 'Section visible',
                'choices' => [
                    'Afficher' => true,
                    'Cacher' => false
                ], 'required' => false, 'placeholder' => false])
            ->add('save', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionSocialNetwork::class,
        ]);
    }
}
