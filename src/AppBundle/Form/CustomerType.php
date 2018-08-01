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
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CustomerType extends AbstractType
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
            ->add('legalForm', LegalFormType::class)
            ->add('taxSystem', TaxSystemType::class)
            ->add('vatSystem', VatSystemType::class)

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
            ->add('apeCode', ApeCodeType::class)

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
            'data_class' => 'AppBundle\Entity\Customer',
            'add_contact_data' => true,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_customer';
    }
}
