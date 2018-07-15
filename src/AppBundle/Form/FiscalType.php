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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiscalType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, [
                'required' => true,
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker form-control'],
                'label' => 'Date ouverture',
            ])
            ->add('closeDate', DateType::class, [
                'required' => true,
                'format' => 'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker form-control'],
                'label' => 'Date de fermeture',
            ])

          //  ->add('status', TextType::class, array(
             //       'label' => false
            //    ))
            ->add('assignment', AssignmentType::class, [
                'label' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\FiscalYear',
            'forEdit' => false,
            'advisories' => [],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fiscalyear';
    }
}
