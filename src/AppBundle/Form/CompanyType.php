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
        ->add('socialReason', TextType::class, array(
            'label' => 'Raison sociale'
        ))

        ->add('legalForm', TextType::class, array(
            'label' => 'Form juridique'
        ))

        ->add('taxationRegime', TextType::class, array(
            'label' => 'Regime d\'imposition',
        ))

        ->add('vatSystem', TextType::class, array(
            'label' => 'Regime TVA',

        ))

        ->add('apeCode', TextType::class, array(
            'required' => false,
            'label' => 'Code APE'
        ))

        ->add('mainActivity', TextType::class, array(
            'required' => false,
            'label' => 'Activité principale'
        ))

        ->add('currentAddress', AddressType::class)

        ->add('siretNumber', TextType::class, array(
            'required' => false,
            'label' => 'N SIRT'
        ))

        ->add('sirenNumber', TextType::class, array(
            'required' => false,
            'label' => 'N SIREN'
        ))

        ->add('intraCommunityVAT', TextType::class, array(
            'required' => false,
            'label' => 'TVA'
        ))

        ->add('nbActions', TextType::class, array(
            'required' => false,
            'label' => 'Nombre action sociale'
        ))

        ->add('capitalSocial', TextType::class, array(
            'required' => false,
            'label' => 'Capitale social'
        ))


        ;
    }



    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class'    => 'AppBundle\Entity\Company',
            'forEdit'       => false,
            'advisories'    => array()
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
