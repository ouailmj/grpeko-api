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
class JuridiqueType extends AbstractType
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

            ->add('mainActivity', TextType::class, array(
                'required' => false,
                'label' => 'Activité principale'
            ))

            ->add('currentAddress', AddressType::class, array(
                'label' => false,
            ))


            ->add('apeCode', ChoiceType::class, array(
                'label' => 'Code APE:',
                'choices' => array('In Stock' => true, 'Out of Stock' => false),
                'required'  => false
            ))

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
            ->add('capitalSocial', NumberType::class, array(
                'label' => 'Capital social:',
                'required'  => false
            ))
        ;
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