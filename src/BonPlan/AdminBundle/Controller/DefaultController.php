<?php

namespace BonPlan\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BonPlanAdminBundle:Default:index.html.twig');
    }
}
