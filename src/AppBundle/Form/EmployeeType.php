<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use AppBundle\Entity\JobPosition;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
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
                'label' => 'Nom'
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Prénom'
            ))
            ->add('initials', TextType::class, array(
                'label' => 'Initiales'
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
            ->add('postalCode', TextType::class, array(
                'label' => 'Code postal'
            ))
            ->add('jobPosition', EntityType::class, array(
                'class' => JobPosition::class,
                'label' => 'Type'
            ))
            ->add('manager', EntityType::class, array(
                'class' => Employee::class,
                'label' => 'Supérieur'
            ))
            ->add('userAccount', UserType::class, array(
                'label' => 'Informations de connexion'
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
