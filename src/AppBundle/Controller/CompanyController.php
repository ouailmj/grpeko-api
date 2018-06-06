<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class CompanyController extends Controller
{

     /**
     * @Route("/client/information_generale", name="add_company")
     */
    public function createEmployerAction(Request $request)
    {
        $company = new Company();
    
        $form = $this->createForm('AppBundle\Form\CompanyType', $company);
        //    $form->handleRequest($request);
         
        //    if ($form->isSubmitted() && $form->isValid()) {
        //     //Get data from the form
        //       $emloyer= $form->getData();
        //       $em = $this->getDoctrine()->getManager();
        //       $em->persist($emloyer);
        //       $em->flush();
        //       $this->addFlash(
        //         'notice',
        //         'emloyer Added');
        //    }
        return $this->render('default/information_generale.html.twig',[
           'form' => $form->createView(),
        ]
        );
    }

  
}


 