<?php

namespace AppBundle\Form;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Repository\RoleRepository;
use AppBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class AccountEmployer extends AbstractType
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


        ->add('phoneNumber', TextType::class, array(
           
            'label' => 'Téléphone'
        ))

        ->add('manager', EntityType::class, array(
           
            'label' => 'Supérieur',
            'class' => 'AppBundle\Entity\Employee',
            'choice_label' => function ($manager) {
                return $manager->getUserAccount()->getInitials();
            },
            'choices_as_values' => true,
            'required' => true,
        ))

        ->add('jobPosition', JobpositionType::class)

        ->add('userAccount', UserType::class)

        ->add('status', CheckboxType::class, array(
            'label' => 'Activer ?',
           
        ))
        ;
    }
    
       /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'AppBundle\Entity\Employee',
            'forEdit'       => false,
            'advisories'    => array()
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employe';
    }


}
