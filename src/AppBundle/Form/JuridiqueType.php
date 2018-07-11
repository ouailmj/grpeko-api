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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class JuridiqueType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('legalName', TextType::class, [
                'label' => 'Raison sociale',
            ])
            ->add('legalForm', ChoiceType::class, [
                'label' => 'Form juridique',
                'choices' => [
                    'SARL' => 'SARL',
                    'EURL' => 'EURL',
                    'SELARL' => 'SELARL',
                    'SA' => 'SA',
                    'SAS' => 'SAS',
                    'SASU' => 'SASU',
                    'SARL' => 'SARL',
                    'SNC' => 'SNC',
                    'SCP' => 'SCP',
                ],
            ])

            ->add('taxationRegime', TextType::class, [
                'label' => 'Régime d\'imposition',
            ])
            ->add('vatSystem', TextType::class, [
                'label' => 'Régime de TVA',
            ])

            ->add('mainActivity', TextType::class, [
                'required' => false,
                'label' => 'Activité principale',
            ])

            ->add('currentAddress', AddressType::class, [
                'label' => false,
            ])

            ->add('apeCode', ChoiceType::class, [
                'label' => 'Code APE:',
                'choices' => ['In Stock' => true, 'Out of Stock' => false],
                'required' => false,
            ])

            ->add('siretNumber', TextType::class, [
                'required' => false,
                'label' => 'N° SIRET',
            ])
            ->add('sirenNumber', TextType::class, [
                'required' => false,
                'label' => 'N° SIREN',
            ])
            ->add('intraCommunityVAT', TextType::class, [
                'required' => false,
                'label' => 'N° TVA Intra Communautaire',
            ])
            ->add('nbActions', TextType::class, [
                'required' => false,
                'label' => 'Nombre d\'action ou parts sociales',
            ])
            ->add('capitalSocial', NumberType::class, [
                'label' => 'Capital social:',
                'required' => false,
            ])
        ;
        // }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Company',
            'add_contact_data' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_company';
    }
}
