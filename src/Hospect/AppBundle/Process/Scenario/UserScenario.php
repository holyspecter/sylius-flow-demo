<?php

namespace Hospect\AppBundle\Process\Scenario;

use Hospect\AppBundle\Process\Step\MainStep;
use Sylius\Bundle\FlowBundle\Process\Scenario\ProcessScenarioInterface;
use Symfony\Component\DependencyInjection\ContainerAware;
use Sylius\Bundle\FlowBundle\Process\Builder\ProcessBuilderInterface;

class UserScenario extends ContainerAware implements ProcessScenarioInterface
{
    /** {@inheritdoc} */
    public function build(ProcessBuilderInterface $builder)
    {
        $builder
            ->add('main', new MainStep());
    }
} 