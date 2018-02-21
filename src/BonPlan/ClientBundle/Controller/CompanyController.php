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
        $i=1;
        $somme=0;
        $qp=0;$ser=0;$sa=0;
        foreach ($reviews as $review){
            $client =  $em->getRepository('BonPlanUserBundle:User')->find($review->getIdClient());

            $somme=$somme+($review->getGlobalMark());
            $ser=$qp+$review->getService();
            $sa=$sa+$review->getSatisfaction();
            $qp=$qp+$review->getQualityPrice();
            $i++;
        }
        return $this->render('BonPlanClientBundle:Front:profile.html.twig',array("company"=>$company,"reviews"=>$reviews
        ,"noteglobale"=>($somme/$i),"noteservice"=>round(($ser/$i)*20),"s"=>$somme,"notesatisfaction"=>round(($sa/$i)*20),"noteqp"=>round(($qp/$i)*20)));

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
