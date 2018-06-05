<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class UserController extends Controller
{

    /**
     * @Route("/client/gestion-cabinet", name="liste")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $employers = $em->getRepository('AppBundle:Employee')->findAll();
      
        return $this->render('default/gestion-cabinet.html.twig', array('employer' => $employers));
        
    }
     /**
     * @Route("/client/add-collaborateur", name="add-collaborateur")
     */
    public function createemployerAction(Request $request)
    {
        // $em = $this->getDoctrine()->getManager();
        // $users = $em->getRepository('AppBundle:Employee')->findAll();
       

        $emloyer = new Employee();
    
        $form = $this->createForm('AppBundle\Form\UserType', $emloyer);

              

           $form->handleRequest($request);
         
           if ($form->isSubmitted() && $form->isValid()) {
            //Get data from the form
              $emloyer= $form->getData();
              $em = $this->getDoctrine()->getManager();
              $em->persist($emloyer);
              $em->flush();
              $this->addFlash(
                'notice',
                'emloyer Added');
           }


        return $this->render('default/Add-collaborateurs.html.twig',[
           'form' => $form->createView(),
        ]
        );
    }
}
