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

use AppBundle\Entity\JobPosition;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('firstName', TextType::class, [
                'label' => 'Nom',
                'required' => true,
                'attr' => ['style' => 'text-transform: uppercase'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['style' => 'text-transform: capitalize'],
                'required' => true,
            ])

            ->add('birthDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Date de naissance',
                'attr' => [
                    'class' => 'french_picker',
                ],
            ])

            ->add('entryDate', DateType::class, [
                'required' => true,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Date d\'entrée',
                'attr' => [
                    'class' => 'french_picker',
                ],
            ])
            ->add('initials', TextType::class, [
                'label' => 'Code',
            ])

            ->add('currentAddress', AddressType::class, [
                'label' => false,
            ])

            ->add('phoneNumber', TextType::class, [
                'label' => 'Téléphone',
                'attr' => [
                    'placeholder' => 'Exp: +336234521',
                ],
            ])
            ->add('faxNumber', TextType::class, [
                'label' => 'Fax',
                'attr' => [
                    'placeholder' => 'Exp: +336234521',
                ],
            ])

//            ->add('addresses', CollectionType::class,
//                [
//                    'entry_type'   => FiscalType::class,
//                    'label'        => false,
//                    'allow_add'    => true,
//                    'allow_delete' => true,
//                    'prototype'    => true,
//                    'required'     => true,
//                    'attr'         => [
//                        'class' => "add-fiscal-collection",
//                    ],
//                ])
            ->add('currentAddress', AddressType::class, [
                'label' => false,
            ])

            ->add('jobPosition', EntityType::class, [
                'class' => JobPosition::class,
                'label' => 'Type',
            ])
            ->add('manager', EntityType::class, [
                'label' => 'Supérieur',
                'class' => 'AppBundle\Entity\Employee',
                'choice_label' => function ($manager) {
                    return $manager->getInitials().' '.$manager->getLastName().' '.$manager->getFirstName();
                },
                'choices_as_values' => true,
                'required' => true,
            ])
           ;
        if ($options['user']) {
            $builder
                     ->add('userAccount', UserType::class, [
                         'label' => false,
                     ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Employee',
            'required' => true,
            'user' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employee';
    }
}
