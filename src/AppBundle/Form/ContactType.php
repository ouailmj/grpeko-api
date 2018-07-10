<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility', TextType::class, array(
                'label' => 'Civilité:',
                'required'  => true,
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'Nom:',
                'required'  => true,
                'mapped'=>false,
            ))
            ->add('lastname', TextType::class, array(
                'label' => 'Prénom:',
                'required'  => true,
                'mapped'=>false,
            ))
            ->add('intermediate', TextType::class, array(
                'label' => 'de part:',
                'required'  => false
            ))
            ->add('mandataire', EmailType::class, array(
                    'label' => 'Mandataire social principal:',
                    'required'  => false,
                    'mapped'=>false
                ))
            ->add('associe', CheckboxType::class, array(
                    'label' => ' est Associé ?',
                    'required'  => false,
                    'mapped'=>false
                ))
            ->add('email', TextType::class, array(
                    'label' => 'email',
                    'required'  => true,
                    'mapped'=>false,
                )

    );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => null,
            //'require_password'  => true
        ));
        //    $resolver->setRequired('address');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_Contact';
    }


}
