<?php

namespace Hospect\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class MainInfoType extends AbstractType
{
    /** {@inheritdoc} */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('login', 'text')
            ->add('password', 'password')
            ->add('name', 'text');
    }

    /** {@inheritdoc} */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'        => 'Hospect\AppBundle\Entity\User',
            'validation_groups' => ['main'],
        ]);
    }

    /** {@inheritdoc} */
    public function getName()
    {
        return 'main';
    }
} 