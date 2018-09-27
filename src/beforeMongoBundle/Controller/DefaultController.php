<?php

namespace beforeMongoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('beforeMongoBundle:Default:index.html.twig');
    }
}
