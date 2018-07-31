<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Form;

use AppBundle\Entity\Employee;
use AppBundle\Entity\TypeMission;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
                'required' => false,
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
            ->add('societe_creer', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
            ])
            ->add('integralite', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
            ])
            ->add('date_creation', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('date_cloture', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('IRPP', ChoiceType::class, [
                'choices' => [
                    'Oui' => 1,
                    'Non' => 0,
                ],
                'label' => false,
            ])
            ->add('date_creation_souhait', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
            ])
            ->add('zone', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
            ])
            ->add('date1', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('date2', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('date3', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('societeactuelle', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
                'mapped' => false,
            ])
            ->add('societeactuelle_date', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('holding', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
                'mapped' => false,
            ])
            ->add('holding_date', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('epargne_check', ChoiceType::class, [
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'label' => false,
                'mapped' => false,
            ])
            ->add('epargne_date', DateType::class, [
                'required' => true,
                'format' => 'd/M/y',
                'widget' => 'single_text',
                'attr' => ['class' => 'french_picker'],
                'label' => false,
                'mapped' => false,
                'data' => new \DateTime(),
            ])
            ->add('company', CustomerType::class, [
                'label' => false,
                'required' => true,
            ]);

        for ($i = 1; $i <= 5; ++$i) {
            $builder->add('date1text'.$i, TextType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
            ])
            ->add('date2text'.$i, TextType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
            ])
             ->add('date3text'.$i, TextType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
            ])
            ->add('comment'.$i, TextType::class, [
                'label' => false,
                'mapped' => false,
                'required' => false,
        ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\EnterRelation',
            'require_password' => true,
        ]);
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
