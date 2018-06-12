<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterRelation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("/relation")
 */

class EnterRelationController extends BaseController
{

    /**
     * @Route("/add", name="relation_new")
     *
     */

    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $relationentre = new EnterRelation();

        $form1 = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);
        $form1->handleRequest($request);
        $em->getRepository('AppBundle:Employee')->findAll();
        if ($form1->isSubmitted() && $form1->isValid()) {

            $this->getDoctrine()->getManager()->persist($relationentre);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash();

            $this->redirectToRoute('relation_new');
        }

        return $this->render('default/client_entre_relation.html.twig', array('form1' => $form1->createView()));


    }


}
