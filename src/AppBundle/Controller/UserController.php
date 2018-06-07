<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Employee;
use AppBundle\Model\EmployeeManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;



class UserController extends BaseController
{

    /**
     * @Route("/client/gestion-cabinet", name="liste")
     */
    public function listAction()
    {
        $em = $this->getDoctrine()->getManager();
        $employers = $em->getRepository('AppBundle:Employee')->findAll();
      
        return $this->render('default/gestion-cabinet.html.twig', array('employers' => $employers));
        
    }
     /**
     * @Route("/client/add-collaborateur", name="add-collaborateur")
     */
    public function createEmployerAction(Request $request, EmployeeManager $employeeManager)
    {
        $emloyer = new Employee();
    
        $form = $this->createForm('AppBundle\Form\AccountEmployer', $emloyer);
           $form->handleRequest($request);
         
           if ($form->isSubmitted() && $form->isValid()) {
             if (!empty($plainPassword = $form->get('password')->getData())){
                 $emloyer->getUserAccount()->setPlainPassword($plainPassword);
             }
             $employeeManager->createEmployee($emloyer);
             $this->addSuccessFlash();
             $this->redirectToRoute('add-collaborateur');
           }
        return $this->render('default/Add-collaborateurs.html.twig',[
           'form' => $form->createView(),
        ]
        );
    }


    /**
     * @Route("/client/{id}/edit", name="edit-collaborateur")
     */

public function editAction(Employee $emloyee, Request $request) {

    $em = $this->getDoctrine()->getManager();
    $form = $this->createForm('AppBundle\Form\AccountEmployer', $emloyee);
           $form->handleRequest($request);
           if ($form->isSubmitted() && $form->isValid()) {
            //Get data from the form
              $emloyer= $form->getData();
              $em = $this->getDoctrine()->getManager();
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

     /**
     * @Route("/client/{id}/show", name="show-collaborateur")
     */
    public function showAction($id, Request $request) {
        $em = $this->getDoctrine()->getManager();
        $employer = $em->getRepository('AppBundle:Employee')->find($id);
            return $this->render('default/view_collaborateur.html.twig', array('employer' => $employer)
            );
        }
}


 