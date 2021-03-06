<?php

namespace Hospect\AppBundle\Process\Step;

use Hospect\AppBundle\Form\MainInfoType;
use Symfony\Component\Form\Form;
use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;

class MainStep extends BaseStep
{
    /** {@inheritdoc} */
    public function displayAction(ProcessContextInterface $context)
    {
        $context->getStorage()->remove(self::USER);

        return parent::displayAction($context);
    }

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
        return $this->createForm(new MainInfoType(), $data);
    }

    /** {@inheritdoc} */
    protected function onFormValid(Form $form, ProcessContextInterface $context)
    {
        $context->getStorage()->set(self::USER, $form->getData());

        return $this->complete();
    }
} 