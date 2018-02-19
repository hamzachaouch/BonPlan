<?php

namespace BonPlan\ClientBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use BonPlan\UserBundle;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class FrontController extends Controller
{
    public function resultatAction($type)
    {
        $em = $this->getDoctrine()->getManager();
       // $nbr= $em->getRepository('BonPlanAdminBundle:Review')->sum();

        $companies = $em->getRepository('BonPlanAdminBundle:Company')->findBy(['type'=>$type]);
        return $this->render('BonPlanClientBundle:Front:resultat.html.twig',array("companies"=>$companies
        

        ));
    }

    public function indexAction()
    {

        return $this->render('BonPlanClientBundle:Front:index.html.twig');

    }
    public function indextestAction()
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
