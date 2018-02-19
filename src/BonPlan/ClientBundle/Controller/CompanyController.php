<?php

namespace BonPlan\ClientBundle\Controller;



use BonPlan\AdminBundle\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use BonPlan\UserBundle\Entity\User;
class CompanyController extends Controller
{

    public function pageCompanyAction($id){
       
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BonPlanAdminBundle:Company')->find($id);
        $reviews = $em->getRepository('BonPlanAdminBundle:Review')->findBy(['idCompany'=>$id]);

        foreach ($reviews as $review){
            $client =  $em->getRepository('BonPlanUserBundle:User')->find($review->getIdClient());

        }
        return $this->render('BonPlanClientBundle:Front:profile.html.twig',array("company"=>$company,"reviews"=>$reviews));

    }
    /**
     * Creates a new review entity.
     *
     */
    public function newAction(Request $request)
    {
        $company = new Company();
        $em = $this->getDoctrine()->getManager();

        if($request ->isMethod('POST')){
            $company ->setName($request->get('name'))
                ->setDescription($request->get('description'))
                ->setAddress($request->get('address'))
                ->setEmail($request->get('email'))
                ->setType($request->get('type'))

                ->setImgUrl('https//');
            $type=$request->get('prenium');
            if (!empty( $type))
            {
                foreach ( $type as $ty) {
                    $res=$ty;
            }
            }else
            {

                $res=0;

            }
            $company->setPrenium($res);
           $em->persist($company);

           $em->flush();

            return $this->redirectToRoute('bon_plan_home');

        }

        return $this->redirectToRoute('bon_plan_resultat');
    }


    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $company = $em->getRepository('BonPlanAdminBundle:Company')->find($id);

        $em->remove($company);
        $em->flush();


        return $this->redirectToRoute('bon_plan_resultat');
    }

}
