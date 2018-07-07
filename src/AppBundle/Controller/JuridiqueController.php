<?php
/**
 * Created by PhpStorm.
 * User: Bijotri
 * Date: 05/07/2018
 * Time: 12:16
 */

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
 * Class JuridiqueController
 * @package AppBundle\Controller
 * @Route("eJuridique")
 */
class JuridiqueController extends BaseController
{
    /**
     * @Route("/", name="juridique_index")
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
        return $this->render('eJuridique/index.html.twig', array(
            'companys'     => $companys,
            'delete_form'   => $listcompanys
        ));
    }
    /**
     * Deletes a Company entity.
     *  @Route("/{id}/delete", name="juridique_delete")
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
        return $this->redirectToRoute('juridique_index');
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
            ->setAction($this->generateUrl('juridique_delete', array('id' => $company->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * Creates a new company entity.
     *
     *
     * @Route("/new", name="juridique_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $company = new Company();
        $form = $this->createForm('AppBundle\Form\JuridiqueType', $company);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($company);
            $em->flush();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');
        }
        return $this->render('eJuridique/new.html.twig', array(
            'company' => $company,
            'form' => $form->createView(),
        ));

    }
    /**
     * @Route("/edit/{id}", name="juridique_edit")
     *
     */
    public function editAction(Company $company, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $form1 = $this->createForm('AppBundle\Form\JuridiqueType', $company);
        $form1->handleRequest($request);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $em->flush();
            $this->addSuccessFlash();
        }
        return $this->render('eJuridique/edit.html.twig',
            array('form1' => $form1->createView()));
    }
}