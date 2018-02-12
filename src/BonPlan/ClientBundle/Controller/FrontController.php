<?php

namespace BonPlan\ClientBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class FrontController extends Controller
{
    public function resultatAction()
    {
        return $this->render('BonPlanClientBundle:Front:resultat.html.twig');
    }

    public function indexAction()
    {

        return $this->render('BonPlanClientBundle:Front:index.html.twig');

    }

    public function inscriEntrepriseAction()
    {
        return $this->render('BonPlanClientBundle:Front:entrepriseInscri.html.twig');
    }
    public function inscriClientAction()
    {
        return $this->render('BonPlanClientBundle:Front:clientInscri.html.twig');
    }



}
