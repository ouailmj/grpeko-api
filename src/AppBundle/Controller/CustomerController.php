<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Customer;
use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\User;
use AppBundle\Form\CustomerType;
use AppBundle\Form\FiscalDetailsType;
use AppBundle\Form\FiscalType;
use AppBundle\Model\ClientManager;
use AppBundle\Model\ContactManager;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Event\AppEvents;
use AppBundle\Event\ClientCreatedEvent;
use AppBundle\Event\RendezVousCreatedEvent;

/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("company")
 */
class CustomerController extends BaseController
{
    private  $clientManager;
    private  $contactManager;
    private $em;
    /**
     * CompanyController constructor.
     */
    public function __construct(ClientManager $clientManager,ContactManager $contactManager, EntityManager $em)
    {
        $this->clientManager= $clientManager;
        $this->contactManager= $contactManager;
        $this->em= $em;

    }

    /**
     * @Route("/list", name="company_index")
     */
    public function indexAction(Request $request)
    {
        $companys = $this->clientManager->findAllClients();
        $listcompanys=[];
        foreach ($companys as $company)
        {
            array_push($listcompanys, $this->createDeleteForm($company)->createView());
        }

        return $this->render('company/show.html.twig', array(
            'companys'     => $companys,
            'delete_form'   => $listcompanys
        ));
    }


    /**
     * Deletes a Company entity.
     *  @Route("/{id}/delete", name="company_delete")
     *  @Method("DELETE")
     */
    public function deleteAction(Request $request, Company $company)
    {
        $form = $this->createDeleteForm($company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->clientManager->deleteClient($company);
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
     * @Route("/new", name="company_new")
     */
    public function newAction(Request $request)
    {
        $company = new Customer();
        $formcompany = $this->createForm('AppBundle\Form\CustomerType', $company, array(
            'add_contact_data' => false,
        ));
        $formcompany->handleRequest($request);

        if ($formcompany->isSubmitted() && $formcompany->isValid()) {

            $contacts=[ $formcompany->get("contacts")->get("firstname")->getData(),
                        $formcompany->get("contacts")->get("lastname")->getData(),
                        $formcompany->get("contacts")->get("email")->getData(),
             ];


            $this->clientManager->createClient($company,$contacts);
         //   $this->get('event_dispatcher')->dispatch(AppEvents::CLIENT_CREATED, new ClientCreatedEvent($company));
            $this->addSuccessFlash();
            $this->redirectToRoute('company_new');
        }

        return $this->render('company/new.html.twig',
                            array('formcompany' => $formcompany->createView()));
    }


    /**
     * @Route("/edit/{id}", name="company_edit")
     *
     */
    public function editAction(Customer $company, Request $request)
    {

      // dump($company->getContacts()->first()->getEmail());die;
        $formcompany = $this->createForm('AppBundle\Form\CustomerType', $company);

        $formcompany->handleRequest($request);
        if ($formcompany->isSubmitted() && $formcompany->isValid()) {


            $this->clientManager->editClient($company);
            $this->addSuccessFlash();
        }

        return $this->render('company/edit.html.twig',
            array(
                'formcompany' => $formcompany->createView(),
                'company' => $company
            ));
    }


    /**
     * @Route("/contact/new", name="contact_new")
     *
     */
    public function NewContactAction(Request $request)
    {
        $idcompany=$request->query->get('id');
        $company=$this->em->getRepository('AppBundle:Company')->find($idcompany);
        $contact = new Contact();
        $formcontact = $this->createForm('AppBundle\Form\ContactDetailsType',$contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {

            $contact->setCompany($company);
            $this->contactManager->createContact($contact);
            $this->addSuccessFlash();
           return $this->redirectToRoute('contact_list',["id"=>$idcompany]);
        }
        return $this->render('contact/new.html.twig',array('contact' => $formcontact->createView()));
    }


    /**
     * @Route("/contact/list/{id}", name="contact_list")
     *
     */
    public function ListContactAction(Company $company , Request $request)
    {
        $contacts=$company->getContacts();
        $listcontacts=[];
        foreach ($company->getContacts() as $contact)
        {
            array_push($listcontacts, $this->createContactDeleteForm($contact)->createView());
        }
        return $this->render('contact/list.html.twig',array("contacts"=>$contacts,'delete_form'   => $listcontacts));
    }

    /**
     * @Route("/contact/edit/{id}", name="contact_edit")
     *
     */
    public function editContactAction(Contact $contact, Request $request)
    {
        $formcontact = $this->createForm('AppBundle\Form\ContactDetailsType', $contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {
            foreach ($contact->getChildren() as $c)
            {
                $c->setContact($contact);
            }
            foreach ($contact->getWeddings() as $w)
            {
                $w->setContact($contact);
            }

            $this->contactManager->editContact($contact);
            $this->addSuccessFlash();
        }
        return $this->render('contact/edit.html.twig',
            array(
                'contact' => $formcontact->createView(),
            ));
    }

    /**
     *  Deletes a Contact entity.
     *  @Route("/contact/{id}/delete", name="contact_delete")
     *  @Method("DELETE")
     */
    public function deleteContactAction(Request $request, Contact $contact)
    {
        $idcompany=$contact->getCompany()->getId();
        $form = $this->createContactDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $this->contactManager->deleteContact($contact);
            $this->addSuccessFlash();
        }

        return $this->redirectToRoute('contact_list',["id"=>$idcompany]);
    }

    private function createContactDeleteForm(Contact $contact)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('contact_delete', array('id' => $contact->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/excercice/new", name="excercice_new")
     *
     */
    public function newExcerciceAction(Request $request)
    {
        $excercice=new FiscalYear();
        $idcompany=$request->query->get('id');
        $company=$this->em->getRepository('AppBundle:Company')->find($idcompany);
        $formexcercice = $this->createForm('AppBundle\Form\FiscalDetailsType',$excercice);
        $formexcercice->handleRequest($request);
        if ($formexcercice->isSubmitted() && $formexcercice->isValid()) {
             $excercice->setCompany($company);
             $this->em->persist($excercice);
             $this->em->flush();
          //  $this->contactManager->createContact($excercice);
            $this->addSuccessFlash();
            return $this->redirectToRoute('excerice_list',["id"=>$idcompany]);
        }
        return $this->render('excercice/new.html.twig',array('formexcercice' => $formexcercice->createView()));
    }

    /**
     * @Route("/excerice/list/{id}", name="excerice_list")
     *
     */
    public function listExcericeAction(Company $company ,Request $request)
    {
        $excercices=$company->getFiscalYears();
        $listexcercice=[];
        foreach ($company->getFiscalYears() as $excercice)
        {
            array_push($listexcercice, $this->createExcerciceDeleteForm($excercice)->createView());
        }
        return $this->render('excercice/list.html.twig',array("excercices"=>$excercices,'delete_form'=> $listexcercice));
    }

    /**
     * @Route("/excercice/edit/{id}", name="excercice_edit")
     *
     */
    public function editExcerciceAction(Request $request,FiscalYear $fiscalYear)
    {
         $idCompany=$fiscalYear->getCompany()->getId();

        $formexcercice = $this->createForm(FiscalDetailsType::class, $fiscalYear);
        $formexcercice->handleRequest($request);
        if ($formexcercice->isSubmitted() && $formexcercice->isValid()) {

            $this->em->flush();
            //$this->contactManager->editContact($contact);

            $this->addSuccessFlash();
        }
        return $this->render('excercice/edit.html.twig',
            array(
                'formexcercice' => $formexcercice->createView(),
                'idCompany'=>$idCompany
            ));
    }
    /**
     *  Deletes a FiscalYear entity.
     *  @Route("/excercice/{id}/delete", name="excercice_delete")
     *  @Method("DELETE")
     */
    public function deleteExcerciceAction(Request $request, FiscalYear $fiscalYear)
    {
        $idcompany=$fiscalYear->getCompany()->getId();
        $form = $this->createExcerciceDeleteForm($fiscalYear);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->em->remove($fiscalYear);
            $this->em->flush();
            $this->addSuccessFlash();
        }
        return $this->redirectToRoute('excerice_list',["id"=>$idcompany]);
    }

    private function createExcerciceDeleteForm(FiscalYear $fiscalYear)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('excercice_delete', array('id' => $fiscalYear->getId())))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }


}
