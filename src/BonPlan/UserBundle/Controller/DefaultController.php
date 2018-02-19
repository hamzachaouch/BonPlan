<?php

namespace BonPlan\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BonPlanUserBundle:Default:index.html.twig');
    }
}
