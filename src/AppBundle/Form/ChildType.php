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

use AppBundle\Entity\Child;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, [])
            ->add('firstname', TextType::class, [])
            ->add('birthDate', DateType::class, [
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker form-control'],
                'label' => 'Date de naissance',
            ])
            ->add('deathDate', DateType::class, [
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker form-control'],
                'label' => 'Date de deces',
            ])
            ->add('age', NumberType::class, []);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Child::class,
        ]);
    }
}
