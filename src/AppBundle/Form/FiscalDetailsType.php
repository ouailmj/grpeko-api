<?php
/**
 * Created by PhpStorm.
 * User: Bijotri
 * Date: 13/06/2018
 * Time: 10:55
 */

namespace AppBundle\Form;

use AppBundle\Entity\FormerAccountant;
use AppBundle\Entity\VatSystem;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FiscalDetailsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, array(
                'required' => true,
                'format'=>'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => 'Date ouverture'
            ))
            ->add('closeDate', DateType::class, array(
                'required' => true,
                'format'=>'dd/MM/yyyy',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => 'Date de fermeture'
            ))
            ->add('status', TextType::class, array(
                   'label' => 'Status'
                ))
            ->add('taxsystem',TaxSystemType::class,array('label'=>false))
            ->add('vatSystem', VatSystemType::class,array('label'=>false))

            ->add('mainassignment', AssignmentType::class, array(
                'label' => false
            ))

            ->add('Enregistrer', SubmitType::class, array('attr' => array('class' => 'btn-success','style' => 'float:right')));

        ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class'    => 'AppBundle\Entity\FiscalYear',
            'forEdit'       => false,
            'advisories'    => array()
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_fiscaldetailsyear';
    }


}