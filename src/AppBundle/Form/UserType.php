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

class UserType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $permissions = [
            'user.new.user' => 'ROLE_USER',
            'user.new.admin' => 'ROLE_ADMIN',
        ];
        $builder


        ->add('initials', TextType::class, array(
            'label' => 'initiales',

        ))

        ->add('username', TextType::class, array(
            'label' => 'Login',
        ))

        ->add('email', EmailType::class)

        ->add('new_password', RepeatedType::class, array(
            'mapped' => false,
            'type' => PasswordType::class,
            'invalid_message' => 'The password fields must match.',
            'options' => array('attr' => array('class' => 'password-field')),
            'first_options'  => array('label' => 'Mot de passe'),
            'second_options' => array('label' => 'Confirmer le mot de passe'),
        ))

        ->add('roles', ChoiceType::class, [
            'label' => 'user.new.role',
            'choices' => $permissions,
            'multiple' => false,
            'expanded' => false,
            'mapped' => false,
        ])
        ;
    }
    
       /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class'    => 'AppBundle\Entity\User',
           
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_user';
    }


}
