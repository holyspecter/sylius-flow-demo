<?php

namespace Hospect\AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

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
    public function getName()
    {
        return 'main';
    }
} 