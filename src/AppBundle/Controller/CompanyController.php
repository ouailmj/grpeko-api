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
 * @Route("/company")
 */
class CompanyController extends BaseController
{

    /**
     * @Route("/index", name="company_index")
     *
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

        return $this->render('default/client_index.html.twig', array(
            'companys'     => $companys,
            'delete_form'   => $listcompanys
        ));

    }



    /**
     * Deletes a Company entity.
     *
     *  @Route("/{id}/delete", name="company_delete")
     *  @Method("DELETE")
     *
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

        return $this->redirectToRoute('company_index');
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
     * @Route("/add", name="company_new")
     *
     */

    public function newAction(Request $request)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $companys = $em->getRepository('AppBundle:EnterRelation')->findAll();

        $company = new Company();
      //  $relationentre = new EnterRelation();

        $form1 = $this->createForm('AppBundle\Form\CompanyType', $company, array(
            'add_contact_data' => false,
        ));
       // $form2 = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);

        $form1->handleRequest($request);
        //$form2->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {
         $this->getDoctrine()->getManager()->persist($company);
         $this->getDoctrine()->getManager()->flush();
         $this->addSuccessFlash();
         $this->redirectToRoute('company_new');
        }

        return $this->render('default/client_fiche.html.twig',
                            array('form1' => $form1->createView()));
    }


    /**
     * @Route("/edit/{id}", name="company_edit")
     *
     */

    public function editAction(Company $company, Request $request)
    {

        $form1 = $this->createForm('AppBundle\Form\CompanyType', $company);
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
           $this->getDoctrine()->getManager()->flush();
            $this->addFlash(
                'notice',
                'Bien Modifié !'
            );
        }

        return $this->render('default/access1.html.twig',
                            array('form1' => $form1->createView()));
    }

}
