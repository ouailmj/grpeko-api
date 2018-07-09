<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/2/18
 * Time: 09:59
 */

namespace AppBundle\Form;

use AppBundle\Entity\Wedding;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class WeddingType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startsDate', DateType::class, array(
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => "Date de début de mariage",
            ))
            ->add('endsDate', DateType::class, array(
                'required' => false,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker form-control'),
                'label' => "Date de fin de mariage",
            ))
            ->add('matrimonialRegime', ChoiceType::class, array('choices' => array(
                        'Communauté réduite aux acquêts' => 'Communauté réduite aux acquêts',
                        'Communauté universelle' => 'Communauté universelle',
                        'Séparation de biens' => 'Séparation de biens',
                        'Participation aux acquêts' => 'Participation aux acquêts',
                 )  , 'label' => "Régime matrimonial"));

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Wedding::class,
        ));
    }

}