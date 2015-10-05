<?php

namespace TMSolution\FormTypeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('TMSolutionFormTypeBundle:Default:index.html.twig', array('name' => $name));
    }
}
