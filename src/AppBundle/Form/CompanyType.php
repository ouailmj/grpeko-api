<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
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
                   'label' => 'Raison Sociale:',
                   'required'  => false
               ))
               ->add('legalForm', ChoiceType::class, array(
                   'label' => 'Forme Juridique:',
                   'required'  => false
               ))
               ->add('taxationRegime', ChoiceType::class, array(
                   'label' => 'Régime d\'imposition:',
                   'required'  => false
               ))
               ->add('vatSystem', ChoiceType::class, array(
                   'label' => 'Régime de TVA:',
                   'required'  => false
               ))
               ->add('currentAddress', AdresseType::class)

               ->add('siegeAddress', AdresseType::class)

               ->add('oldAddresses', AdresseType::class)

               ->add('apeCode', ChoiceType::class, array(
                    'label' => 'Code APE:',
                    'choices' => array('In Stock' => true, 'Out of Stock' => false),
                    'required'  => false
                ))
               ->add('mainActivity', TextType::class, array(
                   'label' => 'Activité principale:',
                   'required'  => false
               ))
                ->add('siretNumber', TextType::class, array(
                    'label' => 'N° SIRET:',
                    'required'  => false
                ))
                ->add('sirenNumber', TextType::class, array(
                    'label' => 'N° SIREN:',
                    'required'  => false
                ))
                ->add('intraCommunityVAT', TextType::class, array(
                    'label' => 'N° TVA Intra Communautaire',
                    'required'  => false
                ))
                ->add('nbActions', TextType::class, array(
                    'label' => 'Nombre d\'actions ou parts socials',
                    'required'  => false
                ))
                ->add('capitalSocial', TextType::class, array(
                    'label' => 'Capital social:',
                    'required'  => false
                ))
        ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Company',
            'require_password'  => true,
            'company'      => null
        ));
        $resolver->setRequired('company');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_company';
    }


}
