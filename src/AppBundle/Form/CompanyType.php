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
                       'SA' => 'SA',
                   ],
                    'required' => true,
               ])
               ->add('taxationRegime', ChoiceType::class, [
                   'label' => 'Régime d\'imposition:',
                   'required' => false,
                   'choices'    => array(
                       'IS - Réel Normal'       => 'IS - Réel Normal',
                       'IS - Réel Simplifié'    => 'IS - Réel Simplifié',
                       'Non assujetti'          => 'Non assujetti',
                       'BIC Réel'               => 'BIC Réel'
                   )
               ])
               ->add('vatSystem', ChoiceType::class, [
                   'label' => 'Régime de TVA:',
                   'required' => false,
                   'choices'    => array(
                       'TVA réel normal mensuel'        => 'TVA réel normal mensuel',
                       'TVA mini réel mensuel'          => 'TVA mini réel mensuel',
                       'TVA mini réel trimestriel'      => 'TVA mini réel trimestriel',
                       'TVA réel simplifié'             => 'TVA réel simplifié',
                       'Non assujetti'                  => 'Non assujetti',
                       'TVA mini normal trimestriel'    => 'TVA mini normal trimestriel'
                   )
               ])
               ->add('currentAddress', AdresseCurrentType::class)

               ->add('SieAddress', AdresseType::class, [
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
                        '01.1 - CULTURES NON PERMANENTES' => '01.1 - CULTURES NON PERMANENTES',
                        '01.2 - CULTURES PERMANENTES' => '01.2 - CULTURES PERMANENTES',
                        '01.3 - ...' => '01.3 - ...',
                        '01.4 - ...' => '01.4 - ...',
                        '01.5 - ...' => '01.5 - ...',
                        '01.6 - ...' => '01.6 - ...',
                        '01.7 - ...' => '01.7 - ...',
                    ],
                    'required' => false,
                ])
               ->add('mainActivity', TextType::class, [
                    'label' => 'Activité principale:',
                   'required' => false,
               ])
                ->add('siretNumber', NumberType::class, [
                    'label' => 'N° SIRET:',
                    'required' => true,
                ])
                ->add('sirenNumber', NumberType::class, [
                    'label' => 'N° SIREN:',
                    'required' => true,
                ])
                ->add('intraCommunityVAT', TextType::class, [
                    'label' => 'N° TVA Intra Communautaire',
                    'required' => true,
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

                ->add('Enregistrer', SubmitType::class, ['attr' => ['class' => 'btn-success', 'style' => 'float:right']])

              //  if ($options['add_contact_data']){
                //    $builder
                    ->add('contacts', CollectionType::class,
                            [
                                'entry_type' => ContactClientType::class,
                                'label' => false,
                                'allow_add' => true,
                                'allow_delete' => true,
                                'prototype' => true,
                                'required' => true,
                                'attr' => [
                                    'class' => 'add-contacts-collection',
                                ],
                            ]);

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
