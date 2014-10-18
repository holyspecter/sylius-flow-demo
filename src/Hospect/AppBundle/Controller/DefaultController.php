<?php

namespace Hospect\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $users = $this
            ->get('doctrine.orm.default_entity_manager')
            ->getRepository('HospectAppBundle:User')
            ->findAll();

        return $this->render('HospectAppBundle:Default:index.html.twig', [
            'users' => $users,
        ]);
    }
}
