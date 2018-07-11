<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('civility', TextType::class, [
                'label' => 'Civilité:',
                'required' => true,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'Nom:',
                'required' => true,
                'mapped' => false,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'Prénom:',
                'required' => true,
                'mapped' => false,
            ])
            ->add('intermediate', TextType::class, [
                'label' => 'de part:',
                'required' => false,
            ])
            ->add('mandataire', EmailType::class, [
                    'label' => 'Mandataire social principal:',
                    'required' => false,
                    'mapped' => false,
                ])
            ->add('associe', CheckboxType::class, [
                    'label' => ' est Associé ?',
                    'required' => false,
                    'mapped' => false,
                ])
            ->add('email', TextType::class, [
                    'label' => 'email',
                    'required' => true,
                    'mapped' => false,
                ]
    );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
            //'require_password'  => true
        ]);
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
