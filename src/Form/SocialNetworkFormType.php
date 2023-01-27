<?php

namespace App\Form;

use App\Entity\SocialNetwork;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SocialNetworkFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('facebook', TextType::class, ['label' => 'Saisissez votre lien facebook', 'required' => false])
            ->add('instagram', TextType::class, ['label' => 'Saisissez votre lien instagram', 'required' => false])
            ->add('twitter', TextType::class, ['label' => 'Saisissez votre lien twitter', 'required' => false])
            ->add('linkedin', TextType::class, ['label' => 'Saisissez votre lien linkedin', 'required' => false])
            ->add('tiktok', TextType::class, ['label' => 'Saisissez votre lien tiktok', 'required' => false])
            ->add('youtube', TextType::class, ['label' => 'Saisissez votre lien Youtube', 'required' => false])
            ->add('save', SubmitType::class, ['label'=>'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => SocialNetwork::class,
        ]);
    }
}
