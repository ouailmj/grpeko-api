<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use AppBundle\Entity\JobPosition;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmployeeType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', TextType::class, array(
                'label' => 'Nom',
                'attr' => array('style'=>'text-transform: uppercase' )
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Prénom',
                'attr' => array('style'=>'text-transform: capitalize' )

            ))

            ->add('birthDate',DateType::class,array(
                'required'=>false,
                'widget'=>'single_text',
                'format'=>'dd/MM/yyyy',
                'label' => 'Date de naissance',
                'attr' => array(
                    'class' => 'french_picker'
                )
            ))

            ->add('entryDate',DateType::class,array(
                'required'=>false,
                'widget'=>'single_text',
                'format'=>'dd/MM/yyyy',
                'label' => 'Date Entrer',
                'attr' => array(
                    'class' => 'french_picker'
                )
            ))
            ->add('initials', TextType::class, array(
                'label' => 'Code'
            ))
            ->add('phoneNumber', TextType::class, array(
                'label' => 'Téléphone',
                'attr'  => array(
                    'placeholder'   => 'Exp: +336234521'
                )
            ))
            ->add('faxNumber', TextType::class, array(
                'label' => 'Fax',
                'attr'  => array(
                    'placeholder'   => 'Exp: +336234521'
                )
            ))
            ->add('FixeNumber', TextType::class, array(
                'label' => 'Téléphone fixe',
                'attr'  => array(
                    'placeholder'   => 'Exp: +336234521'
                )
            ))

            ->add('currentAddress', AddressType::class,array(
                'label' => false
            ))


            ->add('jobPosition', EntityType::class, array(
                'class' => JobPosition::class,
                'label' => 'Type'
            ))
            ->add('manager', EntityType::class, array(
                'label' => 'Supérieur',
                'class' => 'AppBundle\Entity\Employee',
                'choice_label' => function ($manager) {
                    return $manager->getInitials().' '.$manager->getLastName().' '.$manager->getFirstName();
                },
                'choices_as_values' => true,
                'required' => true,
            ))

            ->add('userAccount', UserType::class, array(
                'label' => false
            ))

            ->add('status', CheckboxType::class, array(
                'label' => 'Activer ?',
                'required'  => false
            ))
        ;
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Employee'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employee';
    }


}
