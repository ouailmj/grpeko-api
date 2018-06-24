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
                   'required'  => false
               ))
               ->add('legalForm', ChoiceType::class, array(
                   'label' => 'Forme Juridique:',
                   //  'label' => false,
                   'choices'  => array(
                       'SARL' => 'SARL',
                       'SA' => 'SA',
                   ),
                    'required'=>false
               ))
               ->add('taxationRegime', ChoiceType::class, array(
                   'label' => 'Régime d\'imposition:',
                   'required'  => false
               ))
               ->add('vatSystem', ChoiceType::class, array(
                   'label' => 'Régime de TVA:',
                   'required'  => false
               ))
               ->add('currentAddress', AdresseCurrentType::class)

               ->add('sieAddress', AdresseType::class,[
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
                    'choices' => array('In Stock' => true, 'Out of Stock' => false),
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

                ->add('legalName', TextType::class,array(
                    'label'=>false,
                    'required'  => false
                ))
                    ->add('Enregistrer', SubmitType::class, array('attr' => array('class' => 'btn-success','style' => 'float:right')))

              //  if ($options['add_contact_data']){
                //    $builder
                    ->add('contacts', CollectionType::class,
                            [
                                'entry_type'   => ContactClientType::class,
                                'label'        => false,
                                'allow_add'    => true,
                                'allow_delete' => true,
                                'prototype'    => true,
                                'required'     => true,
                                'attr'         => [
                                    'class' => "add-contacts-collection",
                                ],
                            ]);

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
