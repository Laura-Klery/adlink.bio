<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InformationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class,
                [
                    'label' => 'Votre prénom',
                    'required' => false
                ])
            ->add('lastName', TextType::class,
                [
                    'label' => 'Votre nom',
                    'required' => false
                ])
            ->add('email', EmailType::class,
                [
                    'label' => 'Votre email',
                    'required' => false
                ])
            ->add('pseudo', TextType::class,
                [
                    'label' => 'Votre pseudo',
                    'required' => false
                ])
            ->add('password', PasswordType::class,
                [
                    'label' => 'Votre mot de passe',
                    'required' => false
                ])
            ->add('globalFontName', ChoiceType::class,
                [
                    'label' => 'Choisissez la typographie de votre site',
                    'choices' => [
                        'Bitter' => 'Bitter',
                        'Alegreya Sans' => 'Alegreya Sans',
                        'Montserrat' => 'Montserrat',
                        'Playfair Display' => 'Playfair Display',
                        'Lora' => 'Lora',
                        ],
                    'required' => false,
                    'placeholder' => false,
                ])
            ->add('submit', SubmitType::class, ['label' => 'Enregistrer'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
