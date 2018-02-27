<?php

namespace BonPlan\DealsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BonPlanDealsBundle:Default:index.html.twig');
    }
}
