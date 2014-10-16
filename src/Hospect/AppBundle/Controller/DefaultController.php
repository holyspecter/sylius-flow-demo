<?php

namespace Hospect\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('HospectAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
