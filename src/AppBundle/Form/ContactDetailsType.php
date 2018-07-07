<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
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
            ->add('mook', DateType::class, array(

                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('birthPlace', TextType::class, array())

            ->add('birthDept', TextType::class, array())

            ->add('birthCountry', TextType::class, array())

            ->add('nationality', TextType::class, array())

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

            ->add('partNumber', TextType::class, array())

            ->add('partNumberPercent', TextType::class, array('attr'=>array("placeholder"=>"% ")))

            ->add('tns', TextType::class, array())

            ->add('othercompany', TextType::class, array())

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

            ->add('socialCapital', TextType::class, array())
            ->add('representative', TextType::class, array())
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
            ->add('siren', TextType::class, array())

            ->add('intermediate', TextType::class, array(
                'label' => 'de part:',
                'required'  => false
            ));
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
