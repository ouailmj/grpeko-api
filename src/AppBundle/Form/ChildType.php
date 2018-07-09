<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/2/18
 * Time: 09:59
 */

namespace AppBundle\Form;

use AppBundle\Entity\Child;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ChildType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname', TextType::class, array())
            ->add('firstname', TextType::class, array())
            ->add('birthDate', DateType::class, array(
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => "Date de naissance",
            ))
            ->add('deathDate', DateType::class, array(
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => "Date de deces",
            ))
            ->add('age', NumberType::class, array());
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Child::class,
        ));
    }

}