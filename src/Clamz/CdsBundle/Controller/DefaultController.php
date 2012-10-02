<?php

namespace Clamz\CdsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ClamzCdsBundle:Default:index.html.twig', array('name' => $name));
    }
}
