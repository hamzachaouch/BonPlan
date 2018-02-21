<?php

namespace BonPlan\ClientBundle\Controller;



use BonPlan\AdminBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class ReviewController extends Controller
{
    /**
     * Lists all review entities.
     *
     */
  /*  public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('BonPlanAdminBundle:Review')->findAll();
       // $nbr= $em->getRepository('BonPlanAdminBundle:Review')->count();
        return $this->redirectToRoute('bon_plan_resultat'/*, array(
            'reviews' => $reviews,
        );
    }*/

    /**
     * Creates a new review entity.
     *
     */
    public function newAction(Request $request)
    {
        $review = new Review();
        $em = $this->getDoctrine()->getManager();

        if($request ->isMethod('POST')){
             $review ->setTitle($request->get('title'))
                     ->setContent($request->get('avis'))
                     ->setGlobalMark($request->get('globalmark'))
                     ->setIdCompany($request->get('idCompany'))
                     ->setIdClient($request->get('idClient'))
                     ->setDateOfVisit(date_create($request->get('date')))
                     ->setService($request->get('servicemark'))
                     ->setImgUrl($request->get('imgUrl'))
                     ->setQualityPrice($request->get('qpmark'))
                     ->setSatisfaction($request->get('satisfactionmark'));
             $em->persist($review);

            $em->flush();




            return $this->redirectToRoute('company_page',array('id'=>$request->get('idCompany')));

         }

         return $this->redirectToRoute('bon_plan_resultat');
    }



    public function editAction(Request $request)
    {
        $review = new Review();
        $em = $this->getDoctrine()->getManager();


        if($request ->isMethod('POST')) {

            $reviewAncien = $em->getRepository('BonPlanAdminBundle:Review')->find($request->get('id'));

            $review->setTitle($request->get('title'))
                ->setContent($request->get('avis'))
                ->setGlobalMark($request->get('globalmark'))
                ->setIdCompany($request->get('idCompany'))
                ->setIdClient($request->get('idClient'))
                ->setDateOfVisit(date_create($request->get('date')))
                ->setService($request->get('servicemark'))
                ->setImgUrl($request->get('imgUrl'))
                ->setQualityPrice($request->get('qpmark'))
                ->setSatisfaction($request->get('satisfactionmark'));
            $idcompany=$request->get('idcompany');

            $em->remove($reviewAncien);
            $em->flush();
            $em->persist($review);
            $em->flush();



            return $this->redirectToRoute('company_page', array('id'=>$idcompany));
        }
        return $this->redirectToRoute('bon_plan_client_homepage');

    }

    public function directionEditAction($id,$idcompany)
    {

        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('BonPlanAdminBundle:Review')->find($id);
        return $this->render('BonPlanClientBundle:Front:modiferReview.html.twig', array('review'=>$review ,'c'=>$idcompany));

    }

    /**
     * Deletes a review entity.
     *
     */
    public function deleteAction($id,$idcompany)
    {

        $em = $this->getDoctrine()->getManager();
        $review = $em->getRepository('BonPlanAdminBundle:Review')->find($id);
        $em->remove($review);
        $em->flush();

        return $this->redirectToRoute('company_page', array('id'=>$idcompany));
    }





    public function donnerReviewAction($id){
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BonPlanAdminBundle:Company')->find($id);

        return $this->render('BonPlanClientBundle:Front:review.html.twig',array('company'=>$company));

    }
}
