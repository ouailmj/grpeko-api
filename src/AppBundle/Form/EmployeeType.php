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
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
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
                'attr' => ['style' => 'text-transform: uppercase'],
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Prénom',
                'attr' => ['style' => 'text-transform: capitalize'],
            ])

            ->add('birthDate', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Date de naissance',
                'attr' => [
                    'class' => 'french_picker',
                ],
            ])

            ->add('entryDate', DateType::class, [
                'required' => false,
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
                'label' => 'Date Entrer',
                'attr' => [
                    'class' => 'french_picker',
                ],
            ])
            ->add('initials', TextType::class, [
                'label' => 'Code',
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
            ->add('FixeNumber', TextType::class, [
                'label' => 'Téléphone fixe',
                'attr' => [
                    'placeholder' => 'Exp: +336234521',
                ],
            ])

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

            ->add('userAccount', UserType::class, [
                'label' => false,
            ])

            ->add('status', CheckboxType::class, [
                'label' => 'Activer ?',
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Employee',
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
