<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
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
            ->add('civility', ChoiceType::class, array(
                'choices'  => array(
                    'Mr' => 'Mr',
                    'Mme' => 'Mme',
                    'Mlle' => 'Mlle',
                ),
            ))
            ->add('lastname', TextType::class, array(
                'label' => 'lastname:',
                'required'  => false
            ))
            ->add('firstname', TextType::class, array(
                'label' => 'firstname:',
                'required'  => false
            ))
            ->add('birthDate', DateType::class, array(

               'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('birthPlace', TextType::class, array(  'required' => false))

            ->add('birthDept', TextType::class, array(  'required' => false,))

            ->add('birthCountry', TextType::class, array(  'required' => false,))

            ->add('nationality', TextType::class, array(  'required' => false,))

            ->add('mandaQuality', ChoiceType::class, array(
                    'choices'  => array(
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
                    ),
                ))

            ->add('mandaSocial', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ),
            ))

            ->add('associe', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => 'Oui',
                    'Non' => 'Non',
                ),
            ))

            ->add('partNumber', TextType::class, array(  'required' => false,))

            ->add('partNumberPercent', TextType::class, array('attr'=>array("placeholder"=>"% ") , 'required' => false,))

            ->add('tns', TextType::class, array(  'required' => false))

            ->add('othercompany', TextType::class, array(  'required' => false,))

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

            ->add('socialCapital', TextType::class, array(  'required' => false,))
            ->add('representative', TextType::class, array(  'required' => false,))
            ->add('representativeQuality', ChoiceType::class, array(
                'choices'  => array(
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
                ),
                'required'=>true
            ))
            ->add('siren', TextType::class, array('required' => false))

            ->add('phoneNumber', TextType::class, array('required' => false))

            ->add('faxNumber', TextType::class, array('required' => false))

            ->add('email', EmailType::class, array('required' => false))

            ->add('autoEmailReceipt', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))

            ->add('adressenumber', NumberType::class, array('required' => false))

            ->add('adresse', TextType::class, array('required' => false))

            ->add('postalCode', NumberType::class, array('required' => false))

            ->add('city', TextType::class, array('required' => false))

            ->add('country', TextType::class, array('required' => false))

            ->add('ekoNews', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))
            ->add('ekoConseils', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))
            ->add('anniversaire', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))
            ->add('fetes', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))

            ->add('maritalSituation', ChoiceType::class, array('choices' => array(
                'Célibataire' => 'Célibataire',
                'Concubinage' => 'Concubinage',
                'Divorcé' => 'Divorcé',
                'Marié' => 'Marié',
            )))

            ->add('propreSociety', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))

            ->add('comment', TextareaType::class, array('required' => false))

            ->add('childrenNumber', TextType::class, array('required' => false))

            ->add('intermediate', TextType::class, array(
                'label' => 'de part:',
                'required'  => false
            ))


            ->add('weddings', CollectionType::class,
                [
                    'entry_type'   => WeddingType::class,
                    'label'        => 'Mariage',
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'prototype'    => true,
                    'required'     => false,
                    'attr'         => [
                        'class' => "add-wedding-collection",
                    ],
                ])

            ->add('children', CollectionType::class,
                [
                    'entry_type'   => ChildType::class,
                    'label'        => 'enfants',
                    'allow_add'    => true,
                    'allow_delete' => true,
                    'prototype'    => true,
                    'required'     => false,
                    'attr'         => [
                        'class' => "add-child-collection",
                    ],
                ])

            ->add('annualIncome', TextType::class,array('required' => false))
            ->add('owner', ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))

            ->add('husbandJob', TextType::class, array('required' => false))
            ->add('actifsPlacement', TextType::class, array('required' => false))
            ->add('passifs', TextType::class, array('required' => false))
            ->add('previousSituation', TextType::class, array())
            ->add('accre',  ChoiceType::class, array('choices' => array(
                'Oui' => 'Oui',
                'Non' => 'Non',
            )))
            ->add('accreDescription',  TextType::class, array())
            ->add('dateStartJobPole',  DateType::class, array(

                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('dateEndJobPole', DateType::class, array(

                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('ARCE_ARE', TextType::class, array('required' => false))

            ->add('enregistrer', SubmitType::class,
                                      array('attr' => array('class' => 'btn-success','style' => 'float:right;margin-top:20px')));

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
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
            //'require_password'  => true
        ));
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
