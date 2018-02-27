<?php

namespace BonPlan\DealsBundle\Controller;

use BonPlan\DealsBundle\Entity\Coupon;
use BonPlan\DealsBundle\Entity\Deals;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Deal controller.
 *
 */
class DealsController extends Controller
{
    /**
     * Lists all deal entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $deals = $em->getRepository('BonPlanDealsBundle:Deals')->findAll();

        return $this->render('BonPlanDealsBundle:deals:index.html.twig', array(
            'deals' => $deals,
        ));
    }

    /**
     * Creates a new deal entity.
     *
     */
    public function newAction(Request $request,$id)
    {
        $deal = new Deals();

        $form = $this->createForm('BonPlan\DealsBundle\Form\DealsType', $deal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $deal->setIdCompany($id);
            $em->persist($deal);
            $em->flush();

            return $this->redirectToRoute('deals_show', array('id' => $deal->getId()));
        }

        return $this->render('BonPlanDealsBundle:deals:new.html.twig', array(
            'deal' => $deal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a deal entity.
     *
     */
    public function showAction(Deals $deal)
    {
        $deleteForm = $this->createDeleteForm($deal);

        return $this->render('BonPlanDealsBundle:deals:show.html.twig', array(
            'deal' => $deal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing deal entity.
     *
     */
    public function editAction(Request $request, Deals $deal)
    {
        $deleteForm = $this->createDeleteForm($deal);
        $editForm = $this->createForm('BonPlan\DealsBundle\Form\DealsType', $deal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            
            return $this->redirectToRoute('deals_edit', array('id' => $deal->getId()));
        }

        return $this->render('BonPlanDealsBundle:deals:edit.html.twig', array(
            'deal' => $deal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a deal entity.
     *
     */
    public function deleteAction( $id)
    {
        $em = $this->getDoctrine()->getManager();

        $deal = $em->getRepository('BonPlanDealsBundle:Deals')->find($id);

        $em->remove($deal);
            $em->flush();


        return $this->redirectToRoute('deals_index');
    }

    /**
     * Creates a form to delete a deal entity.
     *
     * @param Deals $deal The deal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Deals $deal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('deals_delete', array('id' => $deal->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function generateKeyAction($id)
    {    $em = $this->getDoctrine()->getManager();

        $deal = $em->getRepository('BonPlanDealsBundle:Deals')->find($id);

        $key = "";
        $pool = array_merge(range(0, 9), range('a', 'z'), range('A', 'Z'));

        for ($i = 0; $i < 5; $i++) {
            $key .= $pool[mt_rand(0, count($pool) - 1)];
        }
        return $this->render('BonPlanDealsBundle:deals:coupon.html.twig', array(
            'key' => $key,
            'deal'=>$deal));
    }

    
    public function ajaxInsertAction($id,$username,$key)
    {

        $em = $this->getDoctrine()->getManager();
        $deal = $em->getRepository('BonPlanDealsBundle:Deals')->find($id);
        $deal->setNbrclients($deal->getNbrclients()+1);
        $em->persist($deal);
            $coupon = new Coupon();
            $coupon->setCode($key)->setIdDeal($id)->setNomClient($username);
            $em->persist($coupon);
            $em->flush();
        return $this->redirectToRoute('deals_index');

    }
    public function showDealCompanyAction($idcompany){
        $em = $this->getDoctrine()->getManager();
        $deals = $em->getRepository('BonPlanDealsBundle:Deals')->findBy(['idCompany'=>$idcompany]);
        return $this->render('BonPlanDealsBundle:deals:showDealsCompany.html.twig', array(
            'deals'=>$deals
        ));


    }
}
