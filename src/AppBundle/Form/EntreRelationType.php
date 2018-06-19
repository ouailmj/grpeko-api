<?php

namespace AppBundle\Form;

use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Employee;
use AppBundle\Entity\Mission;
use AppBundle\Entity\TypeMission;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                    return $emplopyee->getUserAccount()->getUsername();
                },
                'multiple' => false,
                'expanded' => false,
                'required'  => false,
            ])
            ->add('typeMission', EntityType::class, [
                'label' => false,
                'attr' => ['class' => 'select-search'],
                'class' => 'AppBundle:TypeMission',
                'choice_label' => function (TypeMission $typemission) {
                    return $typemission->getId();
                },
                'multiple' => false,
                'expanded' => false,
            ])
            ->add('societe_creer', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'No' => false,
                ),
                'label' => false,
            ))
            ->add('integralite', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'Non' => false,
                ),
                'label' => false,
            ))
            ->add('date_creation', DateType::class, array(

                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('date_cloture', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('IRPP', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => 1,
                    'Non' => 0,
                ),
                'label' => false,
            ))
            ->add('date_creation_souhait', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
            ))
            ->add('zone', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'Non' => false,
                ),
                'label' => false,
            ))
            ->add('date1', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('date2', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('date3', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('societeactuelle', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'Non' => false,
                ),
                'label' => false,
                'mapped' => false,
            ))
            ->add('societeactuelle_date', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('holding', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'Non' => false,

                ),
                'label' => false,
                'mapped' => false,
            ))
            ->add('holding_date', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('epargne_check', ChoiceType::class, array(
                'choices'  => array(
                    'Oui' => true,
                    'Non' => false,

                ),
                'label' => false,
                'mapped' => false,
            ))
            ->add('epargne_date', DateType::class, array(
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => array('class' => 'french_picker'),
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ))
            ->add('company', CompanyType::class,[
                'label' => false,
                'required'  => true,

            ]);

        for ($i=1;$i<=5;$i++)
        {
            $builder ->add('date1text'.$i, TextType::class, array(
                'label' => false,
                'mapped' => false,
                'required'=>false
            ))
            ->add('date2text'.$i, TextType::class, array(
                'label' => false,
                'mapped' => false,
                'required'=>false
            ))
             ->add('date3text'.$i, TextType::class, array(
                'label' => false,
                'mapped' => false,
                'required'=>false
            ))
            ->add('comment'.$i, TextType::class, array(
                'label' => false,
                'mapped' => false,
                'required'=>false
        ));
        }
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
