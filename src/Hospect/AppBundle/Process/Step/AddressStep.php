<?php

namespace Hospect\AppBundle\Process\Step;

use Hospect\AppBundle\Form\AddressType;
use Hospect\AppBundle\Form\MainInfoType;
use Symfony\Component\Form\Form;
use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;

class AddressStep extends BaseStep
{
    /** {@inheritdoc} */
    protected function createView(Form $form, ProcessContextInterface $context)
    {
        return $this->render('HospectAppBundle:Process:step.html.twig', [
            'form'    => $form->createView(),
            'context' => $context,
        ]);
    }

    /** {@inheritdoc} */
    protected function getStepForm($data = null)
    {
        return $this->createForm(new AddressType(), $data);
    }

    /** {@inheritdoc} */
    protected function onFormValid(Form $form, ProcessContextInterface $context)
    {
        $this->get('doctrine.orm.default_entity_manager')->persist($form->getData());
        $this->get('doctrine.orm.default_entity_manager')->flush();

        return $this->complete();
    }
} 