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
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactDetailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('civility', ChoiceType::class, [
                'choices' => [
                    'Mr' => 'Mr',
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle',
                ],
            ])
            ->add('lastname', TextType::class, [
                'label' => 'lastname:',
                'required' => false,
            ])
            ->add('firstname', TextType::class, [
                'label' => 'firstname:',
                'required' => false,
            ])
            ->add('birthDate', DateType::class, [
               'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('birthPlace', TextType::class, ['required' => false])

            ->add('birthDept', TextType::class, ['required' => false])

            ->add('birthCountry', TextType::class, ['required' => false])

            ->add('nationality', TextType::class, ['required' => false])

            ->add('mandaQuality', ChoiceType::class, [
                    'choices' => [
                        'Assistant' => 'Assistant',
                        'Autoentrepreneur' => 'Autoentrepreneur',
                        'Directeur général' => 'Directeur général',
                        'Entrepreneur indiveduel' => 'Entrepreneur indiveduel',
                        'Gérant majoritaire' => 'Gérant majoritaire',
                        'Gérant minoritaire' => 'Gérant minoritaire',
                        'Non Mandataire' => 'Non Mandataire',
                        'Président' => 'Président',
                        'Directeur' => 'Directeur',
                        'Profession libéral' => 'Profession libéral',
                    ],
                ])

            ->add('mandaSocial', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
            ])

            ->add('associe', ChoiceType::class, [
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ],
            ])

            ->add('partNumber', NumberType::class, ['required' => false])

            ->add('partNumberPercent', NumberType::class, ['attr' => ['placeholder' => '% '], 'required' => false])

            ->add('tns', TextType::class, ['required' => false])

            ->add('othercompany', TextType::class, ['required' => false])

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

            ->add('socialCapital', TextType::class, ['required' => false])
            ->add('representative', TextType::class, ['required' => false])
            ->add('representativeQuality', ChoiceType::class, [
                'choices' => [
                    'Assistant' => 'Assistant',
                    'Autoentrepreneur' => 'Autoentrepreneur',
                    'Directeur général' => 'Directeur général',
                    'Entrepreneur indiveduel' => 'Entrepreneur indiveduel',
                    'Gérant majoritaire' => 'Gérant majoritaire',
                    'Gérant minoritaire' => 'Gérant minoritaire',
                    'Non Mandataire' => 'Non Mandataire',
                    'Président' => 'Président',
                    'Directeur' => 'Directeur',
                    'Profession libéral' => 'Profession libéral',
                ],
                'required' => true,
            ])
            ->add('siren', TextType::class, ['required' => false])

            ->add('phoneNumber', TextType::class, ['required' => false])

            ->add('faxNumber', TextType::class, ['required' => false])

            ->add('email', EmailType::class, ['required' => false])

            ->add('autoEmailReceipt', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])

            ->add('adressenumber', TextType::class, ['required' => false])

            ->add('adresse', TextType::class, ['required' => false])

            ->add('postalCode', TextType::class, ['required' => false])

            ->add('city', TextType::class, ['required' => false])

            ->add('country', TextType::class, ['required' => false])

            ->add('ekoNews', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])
            ->add('ekoConseils', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])
            ->add('anniversaire', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])
            ->add('fetes', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])

            ->add('maritalSituation', ChoiceType::class, ['choices' => [
                'Célibataire' => 'Célibataire',
                'Concubinage' => 'Concubinage',
                'Divorcé' => 'Divorcé',
                'Marié' => 'Marié',
            ]])

            ->add('propreSociety', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])

            ->add('comment', TextareaType::class, ['required' => false])

            ->add('childrenNumber', NumberType::class, ['required' => false,  'label' => false])

            ->add('intermediate', TextType::class, [
                'label' => 'de part:',
                'required' => false,
            ])

            ->add('weddings', CollectionType::class,
                [
                    'entry_type' => WeddingType::class,
                    'label' => 'Mariage',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'required' => false,
                    'attr' => [
                        'class' => 'add-wedding-collection',
                    ],
                ])

            ->add('children', CollectionType::class,
                [
                    'entry_type' => ChildType::class,
                    'label' => 'enfants',
                    'allow_add' => true,
                    'allow_delete' => true,
                    'prototype' => true,
                    'required' => false,
                    'attr' => [
                        'class' => 'add-child-collection',
                    ],
                ])

            ->add('annualIncome', NumberType::class, ['required' => false])
            ->add('owner', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])

            ->add('husbandJob', TextType::class, ['required' => false])
            ->add('actifsPlacement', TextType::class, ['required' => false])
            ->add('passifs', TextType::class, ['required' => false])
            ->add('previousSituation', TextType::class, ['required' => false])
            ->add('accre', ChoiceType::class, ['choices' => [
                'Oui' => 'Oui',
                'Non' => 'Non',
            ]])
            ->add('accreDescription', TextType::class, ['required' => false])
            ->add('dateStartJobPole', DateType::class, [
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('dateEndJobPole', DateType::class, [
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('ARCE_ARE', TextType::class, ['required' => false])

            ->add('enregistrer', SubmitType::class,
                                      ['attr' => ['class' => 'btn-success', 'style' => 'float:right;margin-top:20px']]);

        //  ->add('associe', CheckboxType::class, array(
            //        'label' => ' est Associé ?',
              //      'required'  => false
            //    )

           // );
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
        return 'appbundle_ContactDetails';
    }
}
