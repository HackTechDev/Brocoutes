<?php

namespace Brocoutes\BrocanteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('BrocoutesBrocanteBundle:Default:index.html.twig', array('name' => $name));
    }
}
