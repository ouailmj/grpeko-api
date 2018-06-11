<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Company;
use AppBundle\Form\CompanyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;



class CompanyController extends BaseController
{
//    /**
//     * @Route("/client/gestion-cabinet", name="liste-company")
//     */
//    public function listAction()
//    {
//        $em = $this->getDoctrine()->getManager();
//        $company = $em->getRepository('AppBundle:Company')->findAll();
//
//        return $this->render('default/gestion-cabinet.html.twig', array('company' => $company));
//
//    }
     /**
     * @Route("/client/information_generale", name="add_company")
     */
    public function createCompanyAction(Request $request)
    {
        $company = new Company();

        $form = $this->createForm('AppBundle\Form\CompanyType', $company);
        $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
             //Get data from the form
               $company= $form->getData();
               $em = $this->getDoctrine()->getManager();
               $em->persist($company);
               $em->flush();
              $this->addSuccessFlash();
            }
        return $this->render('default/information_generale.html.twig',[
           'form' => $form->createView(),
        ]
        );
    }

  
}

