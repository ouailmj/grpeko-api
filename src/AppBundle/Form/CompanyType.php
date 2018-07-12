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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CompanyType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('legalName', TextType::class, [
                'label' => 'Raison Sociale:',
                'required' => true,
            ])
            ->add('legalForm', ChoiceType::class, [
                'label' => 'Forme Juridique:',
                //  'label' => false,
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
                'required' => true,
            ])
            ->add('taxationRegime', ChoiceType::class, [
                'label' => 'Régime d\'imposition:',
                'choices' => [
                    'micro-entreprise' => 'micro-entreprise',
                    'l’auto-entreprise' => 'l’auto-entreprise',
                    'réel simplifié' => 'réel simplifié',
                    'réel normal' => 'réel normal',
                ],
                'required' => false,
            ])
            ->add('vatSystem', ChoiceType::class, [
                'label' => 'Régime de TVA:',
                'choices' => [
                    'le régime du réel normal de TVA ' => 'le régime du réel normal de TVA ',
                    'le régime simplifié d’imposition à la TVA' => 'le régime simplifié d’imposition à la TVA',
                    'le régime de la franchise en base de TVA' => 'le régime de la franchise en base de TVA',
                ],
                'required' => false,
            ])
            ->add('currentAddress', AdresseCurrentType::class)
            ->add('siegeAddress', AdresseType::class, [
                'label' => false,
            ])
            ->add('oldAddresses', CollectionType::class,
                [
                    'entry_type' => AdresseType::class,
                    'label' => 'old adresses',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'required' => false,
                    'attr' => [
                        'class' => 'old-addresses-collection',
                    ],
                ])
            ->add('apeCode', ChoiceType::class, [
                'label' => 'Code APE:',
                'choices' => [
                    '0112' => '0112',
                    '0113' => '0113',
                    '0114' => '0114',
                    '0115' => '0115',
                    '0116' => '0116',
                    '0119' => '0119',
                    '0121' => '0121',
                    '0122' => '0122',
                    '0123' => '0123',
                    '0124' => '0124',
                    '0125' => '0125',
                    '0126' => '0126',
                    '0127' => '0127',
                    '0128' => '0128',
                ],
                'required' => false,
            ])
            ->add('mainActivity', TextType::class, [
                'label' => false,
                'label' => 'Activité principale:',
                'required' => false,
            ])
            ->add('siretNumber', NumberType::class, [
                'label' => 'N° SIRET:',
                'required' => false,
            ])
            ->add('sirenNumber', NumberType::class, [
                'label' => 'N° SIREN:',
                'required' => false,
            ])
            ->add('intraCommunityVAT', TextType::class, [
                'label' => 'N° TVA Intra Communautaire',
                'required' => false,
            ])
            ->add('nbActions', NumberType::class, [
                'label' => 'Nombre d\'actions ou parts socials',
                'required' => false,
            ])
            ->add('capitalSocial', NumberType::class, [
                'label' => 'Capital social:',
                'required' => false,
            ])
            ->add('formerAccountant', FormerAccountantType::class)
            //  if ($options['add_contact_data']){
            //    $builder
            ->add('contacts', ContactType::class, [
            ])
            ->add('fiscalYears', CollectionType::class,
                [
                    'entry_type' => FiscalType::class,
                    'label' => false,
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'required' => true,
                    'attr' => [
                        'class' => 'add-fiscal-collection',
                    ],
                ])
            ->add('customerStatus', CustomerStatusType::class)
            ->add('Enregistrer', SubmitType::class, ['attr' => ['class' => 'btn-success', 'style' => 'float:right']]);
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
