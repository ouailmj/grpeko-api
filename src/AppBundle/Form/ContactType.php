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
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'firstname:',
                'required' => false,
            ])
            ->add('lastname', TextType::class, [
                'label' => 'lastname:',
                'required' => false,
            ])
            ->add('intermediate', TextType::class, [
                'label' => 'de part:',
                'required' => false,
            ])
            ->add('mandataire', TextType::class, [
                    'label' => 'Mandataire social principal:',
                    'required' => false,
                ])
            ->add('associe', CheckboxType::class, [
                    'label' => ' est Associé ?',
                    'required' => false,
                ]
    );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Contact',
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
