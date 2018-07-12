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

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
            ->add('name', TextType::class, [
                'label' => 'Societe:',
                'required' => false,
            ])
            ->add('civility', TextType::class, [
                'label' => 'Civilité:',
                'required' => false,
            ])
            ->add('firstName', TextType::class, [
                'label' => 'Prénom:',
                'required' => false,
            ])
            ->add('lastName', TextType::class, [
                'label' => 'Nom:',
                'required' => false,
            ])
            ->add('address', AdresseType::class)
;
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\FormerAccountant',
            'require_password' => true,
            'adresse' => null,
        ]);
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
