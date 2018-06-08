<?php

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class EntreRelationType extends AbstractType
{


    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('contributor', EntityType::class, [
                'label' => false,
                'attr' => ['class' => 'select-search'],
                'class' => 'AppBundle:Employee',
                'choice_label' => function (Employee $emplopyee) {
                    return $emplopyee->getUserAccount()->getId();
                },
                'multiple' => false,
                'expanded' => false,
            ])
          ;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\EnterRelation',
            'require_password'  => true,
        ));
        //    $resolver->setRequired('address');
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_EntreRelation';
    }


}
