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
                'label' => 'Raison sociale'
            ))
            ->add('legalForm', ChoiceType::class, array(
                'label' => 'Form juridique',
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
                )
            ))
            ->add('taxationRegime', TextType::class, array(
                'label' => 'Régime d\'imposition',
            ))
            ->add('vatSystem', TextType::class, array(
                'label' => 'Régime de TVA',
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
                'label' => 'N° SIRET'
            ))
            ->add('sirenNumber', TextType::class, array(
                'required' => false,
                'label' => 'N° SIREN'
            ))
            ->add('intraCommunityVAT', TextType::class, array(
                'required' => false,
                'label' => 'N° TVA Intra Communautaire'
            ))
            ->add('nbActions', TextType::class, array(
                'required' => false,
                'label' => 'Nombre d\'action ou parts sociales'
            ))
            ->add('capitalSocial', TextType::class, array(
                'required' => false,
                'label' => 'Capitale Social'
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