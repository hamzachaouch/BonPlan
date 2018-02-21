<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 06/02/2018
 * Time: 17:22
 */

namespace BonPlan\AdminBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class backController extends Controller
{

    public function indexAction()
    {
        return $this->render('BonPlanAdminBundle:Default:dashboard.html.twig');

    }
    
    public function AjouterClientAction()
    {
        return $this->render('BonPlanAdminBundle:client:ajouter.html.twig');
    }
    public function ConsulterClientAction()
    {
        return $this->render('BonPlanAdminBundle:client:consulter.html.twig');
    }
    public function AjouterEntrepriseAction()
    {
        return $this->render('BonPlanAdminBundle:entreprise:ajouter.html.twig');
    }
    public function ConsulterEntrepriseAction()
    {
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('BonPlanAdminBundle:Company')->findAll();
        return $this->render('BonPlanAdminBundle:entreprise:consulter.html.twig',array("Companies"=>$reviews,"idcompany"=>null));
    }
    public function ConsulterAvisAction($id)
    {   $idcompany=$id;
        $em = $this->getDoctrine()->getManager();
        $reviews = $em->getRepository('BonPlanAdminBundle:Review')->findBy(['idClient'=>$id]);
        return $this->render('BonPlanAdminBundle:avis:liste.html.twig',array("reviews"=>$reviews,'idcompany'=>$idcompany));
    }
    public function RemoveAvisAction($id,$idcompany){
        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('BonPlanAdminBundle:Review')->find($id);

        $em->remove($review);
        $em->flush();

        return $this->redirectToRoute('ConsulterAvis', array('id'=>$idcompany));
    }
    public function StatistiqueAction()
    {
        return $this->render('BonPlanAdminBundle:Default:statistique.html.twig');
    }
    public function CalendrieAction()
    {
        return $this->render('BonPlanAdminBundle:Default:calendrie.html.twig');
    }
    public function MailAction()
    {
        return $this->render('BonPlanAdminBundle:Default:mail.html.twig');
    }
}