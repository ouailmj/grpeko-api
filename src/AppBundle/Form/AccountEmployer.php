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

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AccountEmployer extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('firstName', TextType::class, [
            'label' => 'Nom',
        ])
        ->add('lastName', TextType::class, [
            'label' => 'Prénom',
        ])

        ->add('phoneNumber', TextType::class, [
            'label' => 'Téléphone',
        ])

        ->add('manager', EntityType::class, [
            'label' => 'Supérieur',
            'class' => 'AppBundle\Entity\Employee',
            'choice_label' => function ($manager) {
                return $manager->getUserAccount()->getInitials();
            },
            'choices_as_values' => true,
            'required' => true,
        ])

        ->add('jobPosition', JobpositionType::class)

        ->add('userAccount', UserType::class)

        ->add('status', CheckboxType::class, [
            'label' => 'Activer ?',
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
            'forEdit' => false,
            'advisories' => [],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_employe';
    }
}
