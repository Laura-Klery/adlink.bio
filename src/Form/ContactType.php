<?php

namespace App\Form;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;


use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            
            ->add('nom',TextType::class,[
                'label'=>'Nom'
            ])
            
            ->add('Prenom',TextType::class,[
                'label'=>'Prenom'
            ])
            ->add('email',EmailType::class,[
                'label'=>'Email'
            ])
            ->add('Objet', ChoiceType::class ,[
                'choices' => [
                    'Question' => 1,
                    'Inquiétude' => 2,
                    'Informations suppléméntaires' => 3,
                ],

            ])
            ->add('message', TextareaType::class)
            
            ->add('envoyer',SubmitType::class,[
                'attr'  =>[
                    'class' =>'btn btn-primary mt-4' 
                ]

            ])
           
        
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
