<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder          
        ->add('lastname', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => '',
            ],
            'label' => 'Nom',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])
        ->add('firstname', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => '',
            ],
            'label' => 'Prénom',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])
        ->add('email', EmailType::class, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => '',
            ],
            'label' => 'Email',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])
        ->add('subject', TextType::class, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => '',
            ],
            'label' => 'Sujet',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])
        ->add('message', TextareaType::class, [
            'attr' => [
                'class' => 'form-control',
                'placeholder' => '',
            ],
            'label' => 'Message',
            'label_attr' => [
                'class' => 'form-label'
            ]
        ])         
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
