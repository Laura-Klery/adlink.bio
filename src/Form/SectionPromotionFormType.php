<?php

namespace App\Form;

use App\Entity\SectionPromotion;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SectionPromotionFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sectionPromotionBackground', ColorType::class,
                ['label' => 'Choisissez la couleur de fond de votre section', 'required' => false])
            ->add('sectionPromotionCardBackground', ColorType::class,
                ['label' => 'Choisissez la couleur de fond de votre carte promotionnelle', 'required' => false])
            ->add('sectionPromotionButtonBackground',ColorType::class,
                ['label' => 'Choisissez la couleur de fond de votre boutton promotionnel', 'required' => false])
            ->add('sectionPromotionCodeColor', ColorType::class,
                ['label' => 'Choisissez la couleur du texte de votre code promotionnel', 'required' => false])
            ->add('sectionPromotionDescriptionColor', ColorType::class,
                ['label' => 'Choisissez la couleur du texte de la description de votre code promotionnel', 'required' => false])
            ->add('enabled', ChoiceType::class, [
                'label' => 'Section visible',
                'choices' => [
                    'Afficher' => true,
                    'Cacher' => false
                ], 'required' => false, 'placeholder' => false])
            ->add('save', SubmitType::class, ['label'=>'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SectionPromotion::class,
        ]);
    }
}
