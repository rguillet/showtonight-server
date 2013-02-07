<?php

namespace S2n\ShowBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('S2nShowBundle:Default:index.html.twig', array('name' => $name));
    }
}
