<?php
/**
 * Created by PhpStorm.
 * User: Bijotri
 * Date: 03/07/2018
 * Time: 15:24
 */

namespace AppBundle\Form;

use AppBundle\Entity\Assignment;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AssignmentType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('employee', EntityType::class, array(
                'label' => 'Affecter un collaborateur',
                'class' => 'AppBundle\Entity\Employee',
                'choice_label' => function ($manager) {
                    return $manager->getLastName().' '.$manager->getFirstName();
                },
                'choices_as_values' => true,
                'required' => true,
            ))
        ;
    }


    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(

            'data_class'    => 'AppBundle\Entity\Assignment',
            'forEdit'       => false,
            'advisories'    => array()
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_assignment';
    }

}