<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Company;
use AppBundle\Entity\EnterRelation;
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



/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("/client")
 */
class CompanyController extends BaseController
{

    /**
     * @Route("/index", name="client_index")
     */

    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $companys = $em->getRepository('AppBundle:Company')->findAll();
        $listcompanys=[];
        foreach ($companys as $company)
        {
            array_push($listcompanys, $this->createDeleteForm($company)->createView());
        }

        return $this->render('client/show.html.twig', array(
            'companys'     => $companys,
            'delete_form'   => $listcompanys
        ));

    }

    /**
     * Deletes a Company entity.
     *  @Route("/{id}/delete", name="client_delete")
     *  @Method("DELETE")
     */

    public function deleteAction(Request $request, Company $company)
    {
        $form = $this->createDeleteForm($company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($company);
            $em->flush();
            $this->addSuccessFlash();
        }

        return $this->redirectToRoute('client_index');
    }

    /**
     * Creates a form to delete a Company entity.
     *
     * @param Company $company The Company entity
     *
     * @return \Symfony\Component\Form\Form The form
     */

    private function createDeleteForm(Company $company)
    {

        return $this->createFormBuilder()
            ->setAction($this->generateUrl('company_delete', array('id' => $company->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


    /**
     * @Route("/new", name="client_new")
     *
     */

    public function newAction(Request $request,\Swift_Mailer $mailer)
    {
        $em = $this->getDoctrine()->getManager();
        $company = new Company();
        $form1 = $this->createForm('AppBundle\Form\CompanyType', $company, array(
            'add_contact_data' => false,
        ));

        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {

               foreach ( $form1->get('contacts') as $data) {
                   $message = \Swift_Message::newInstance()
                            ->setSubject("Fiche Patrimoniale")
                            ->setFrom('groupeekofr.dev@gmail.com')
                            ->setTo($data->get("email")->getData())
                            ->setBody("<html>Bonjour,<br><br>Afin de préparer ce rdv, merci de me retourner cette <a href='/app/relation/add'>fiche patrimoniale</a> remplie stp.</html>" , 'text/html');
                   $this->get('mailer')->send($message);
                   break;
               }

             $em->persist($company);
             $em->flush();
             $this->addSuccessFlash();
             $this->redirectToRoute('client_new');
        }

        return $this->render('client/new.html.twig',
                            array('form1' => $form1->createView()));
    }


    /**
     * @Route("/edit/{id}", name="client_edit")
     *
     */

    public function editAction(Company $company, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form1 = $this->createForm('AppBundle\Form\CompanyType', $company);
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $em->flush();
            $this->addSuccessFlash();
        }

        return $this->render('client/edit.html.twig',
                            array('form1' => $form1->createView()));
    }

}
