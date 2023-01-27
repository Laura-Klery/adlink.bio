<?php

namespace App\Form;

use App\Entity\SectionVideo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VideoFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('link', UrlType::class, ['label' => 'Saisissez le lien de votre vidéo', 'required' => false])
            ->add('sectionVideoBackground', ColorType::class, ['label' => 'Choisissez la couleur de fond de votre section', 'required' => false])
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
            'data_class' => SectionVideo::class,
        ]);
    }
}
