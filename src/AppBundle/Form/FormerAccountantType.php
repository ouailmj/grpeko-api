<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormerAccountantType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, array(
                'label' => 'Societe:',
                'required'  => false
            ))
            ->add('civility', TextType::class, array(
                'label' => 'Civilité:',
                'required'  => false
            ))
            ->add('firstName', TextType::class, array(
                'label' => 'Prénom:',
                'required'  => false
            ))
            ->add('lastName', TextType::class, array(
                'label' => 'Nom:',
                'required'  => false
            ))
            ->add('address', AdresseType::class)
;

    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\FormerAccountant',
            'require_password'  => true,
            'adresse'      => null
        ));
        //    $resolver->setRequired('address');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_formerAccountant';
    }


}
