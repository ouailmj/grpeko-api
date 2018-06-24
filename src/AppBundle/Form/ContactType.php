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
                'required'  => true
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'firstname:',
                'required'  => true
            ))
            ->add('lastname', TextType::class, array(
                'label' => 'lastname:',
                'required'  => true
            ))
            ->add('intermediate', TextType::class, array(
                'label' => 'de part:',
                'required'  => true
            ))
            ->add('mandataire', TextType::class, array(
                    'label' => 'Mandataire social principal:',
                    'required'  => true
                ))
            ->add('associe', CheckboxType::class, array(
                    'label' => ' est Associé ?',
                    'required'  => true
                )

    );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
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
