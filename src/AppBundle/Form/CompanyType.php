<?php

namespace AppBundle\Form;

use AppBundle\Entity\FormerAccountant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
               ->add('legalName', TextType::class, array(
                   'label' => 'Raison Sociale:',
                   'required'  => true
               ))
               ->add('legalForm', ChoiceType::class, array(
                   'label' => 'Forme Juridique:',
                   //  'label' => false,
                   'choices'  => array(
                       'SARL' => 'SARL',
                       'EURL' => 'EURL',
                       'SELARL' => 'SELARL',
                       'SA' => 'SA',
                       'SAS' => 'SAS',
                       'SASU' => 'SASU',
                       'SARL' => 'SARL',
                       'SNC' => 'SNC',
                       'SCP' => 'SCP',
                   ),
                    'required'=>true
               ))
               ->add('taxationRegime', ChoiceType::class, array(
                   'label' => 'Régime d\'imposition:',
                   'choices'=>array(
                       'micro-entreprise'=>'micro-entreprise',
                       'l’auto-entreprise'=>'l’auto-entreprise',
                       'réel simplifié'=>'réel simplifié',
                       'réel normal'=>'réel normal',
                   ),
                   'required'  => false
               ))
               ->add('vatSystem', ChoiceType::class, array(
                   'label' => 'Régime de TVA:',
                   'choices'=>array(
                       'le régime du réel normal de TVA '=>'le régime du réel normal de TVA ',
                       'le régime simplifié d’imposition à la TVA'=>'le régime simplifié d’imposition à la TVA',
                       'le régime de la franchise en base de TVA'=>'le régime de la franchise en base de TVA',
                       ),
                   'required'  => false
               ))
               ->add('currentAddress', AdresseCurrentType::class)

               ->add('siegeAddress', AdresseType::class,[
                   'label' => false,
               ])

              ->add('oldAddresses', CollectionType::class,
                   [
                       'entry_type'   => AdresseType::class,
                       'label'        => 'old adresses',
                       'allow_add'    => true,
                       'allow_delete' => true,
                       'prototype'    => true,
                       'required'     => false,
                       'attr'         => [
                           'class' => "old-addresses-collection",
                       ],
                   ])
               ->add('apeCode', ChoiceType::class, array(
                    'label' => 'Code APE:',
                    'choices' => array(
                        '0112Z'=>'0112Z',
                        '0113Z'=>'0113Z',
                        '0114Z'=>'0114Z',
                        '0115Z'=>'0115Z',
                        '0116Z'=>'0116Z',
                        '0119Z'=>'0119Z',
                        '0121Z'=>'0121Z',
                        '0122Z'=>'0122Z',
                        '0123Z'=>'0123Z',
                        '0124Z'=>'0124Z',
                        '0125Z'=>'0125Z',
                        '0126Z'=>'0126Z',
                        '0127Z'=>'0127Z',
                        '0128Z'=>'0128Z',
                        '...'=>'...'
                    ),
                    'required'  => false
                ))
               ->add('mainActivity', TextType::class, array(
                    'label' => false,
                    'label' => 'Activité principale:',
                   'required'  => false
               ))
                ->add('siretNumber', NumberType::class, array(
                    'label' => 'N° SIRET:',
                    'required'  => false
                ))
                ->add('sirenNumber', NumberType::class, array(
                    'label' => 'N° SIREN:',
                    'required'  => false
                ))
                ->add('intraCommunityVAT', TextType::class, array(
                    'label' => 'N° TVA Intra Communautaire',
                    'required'  => false
                ))
                ->add('nbActions', NumberType::class, array(
                    'label' => 'Nombre d\'actions ou parts socials',
                    'required'  => false
                ))
                ->add('capitalSocial', NumberType::class, array(
                    'label' => 'Capital social:',
                    'required'  => false
                ))
                ->add('formerAccountant', FormerAccountantType::class)


              //  if ($options['add_contact_data']){
                //    $builder

            ->add('contacts', CollectionType::class,
                [
                    'entry_type'   => ContactType::class,
                    'label'        => 'old adresses',
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'prototype'    => true,
                    'required'     => false,
                    'attr'         => [
                        'class' => "add-contact-collection",
                    ],
                ])

                ->add('fiscalYears', CollectionType::class,
                [
                    'entry_type'   => FiscalType::class,
                    'label'        => false,
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'prototype'    => true,
                    'required'     => true,
                    'attr'         => [
                        'class' => "add-fiscal-collection",
                    ],
                ])
                ->add('Enregistrer', SubmitType::class, array('attr' => array('class' => 'btn-success','style' => 'float:right')));

               // }

    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Company',
            'add_contact_data'=>true,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_company';
    }


}
