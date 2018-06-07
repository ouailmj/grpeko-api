<?php

namespace AppBundle\Form;

use AppBundle\Entity\Role;
use AppBundle\Entity\User;
use AppBundle\Repository\RoleRepository;
use AppBundle\Repository\UserRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
