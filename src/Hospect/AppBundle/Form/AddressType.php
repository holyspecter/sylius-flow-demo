<?php

namespace Hospect\AppBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AddressType extends AbstractType
{
    /** {@inheritdoc} */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('country', 'choice', [
                'choices' => [
                    'Poland',
                    'France',
                    'Great Britain',
                ],
            ])
            ->add('region', 'text', [
                'required' => false,
            ])
            ->add('street', 'text', [
                'required' => false,
            ]);

    }

    /** {@inheritdoc} */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults([
            'data_class'        => 'Hospect\AppBundle\Entity\User',
            'validation_groups' => ['address'],
        ]);
    }

    /** {@inheritdoc} */
    public function getName()
    {
        return 'main';
    }
} 