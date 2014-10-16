<?php

namespace Hospect\AppBundle\Process\Step;

use Symfony\Component\Form\Form;
use Sylius\Bundle\FlowBundle\Process\Context\ProcessContextInterface;
use Sylius\Bundle\FlowBundle\Process\Step\ControllerStep;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseStep extends ControllerStep
{
    const USER = 'user';
    
    /** {@inheritdoc} */
    public function displayAction(ProcessContextInterface $context)
    {
        return $this->createView(
            $this->getStepForm($context->getStorage()->get(self::USER)),
            $context
        );
    }

    /** {@inheritdoc} */
    public function forwardAction(ProcessContextInterface $context)
    {
        $form = $this->getStepForm($context->getStorage()->get(self::USER));
        $form->handleRequest($context->getRequest());

        if ($context->getRequest()->isMethod('POST') && $form->isValid()) {
            return $this->onFormValid($form, $context);
        }

        return $this->createView($form, $context);
    }

    /**
     * @param Form $form
     * @param ProcessContextInterface $context
     *
     * @return Response
     */
    abstract protected function createView(Form $form, ProcessContextInterface $context);

    /**
     * @param mixed $data
     *
     * @return Form
     */
    abstract protected function getStepForm($data = null);

    /**
     * @param Form                    $form
     * @param ProcessContextInterface $context
     *
     * @return mixed
     */
    abstract protected function onFormValid(Form $form, ProcessContextInterface $context);
}