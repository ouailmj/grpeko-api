<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Address;
use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Customer;
use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\Invoice;
use AppBundle\Entity\User;
use AppBundle\Form\ContactDetailsType;
use AppBundle\Form\CustomerType;
use AppBundle\Form\FiscalDetailsType;
use AppBundle\Form\FiscalType;
use AppBundle\Model\ClientManager;
use AppBundle\Model\ContactManager;
use AppBundle\Model\FiscalManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("company")
 */
class CustomerController extends BaseController
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em=$em;
    }

    /**
     * @Route("/list", name="company_index")
     */
    public function indexAction(Request $request,ClientManager $cm)
    {

        $companys = $cm->findAllClients();
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
    public function deleteAction(Request $request, Customer $company,ClientManager $cm)
    {
        $form = $this->createDeleteForm($company);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $cm->deleteClient($company);
            $this->addSuccessFlash();
        }

        return $this->redirectToRoute('company_index');
    }

    /**
     * Creates a form to delete a Company entity.
     *
     * @param Company $company The Company entity
     *
     * @return \Symfony\Component\Form\FormInterface The form
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
    public function newAction(Request $request,ClientManager $cm)
    {
        $company = new Customer();
        $formcompany = $this->createForm(CustomerType::class, $company, array(
            'add_contact_data' => false,
        ));
        $formcompany->handleRequest($request);

        if ($formcompany->isSubmitted() && $formcompany->isValid()) {

            $contacts=[ $formcompany->get("contacts")->get("firstname")->getData(),
                        $formcompany->get("contacts")->get("lastname")->getData(),
                        $formcompany->get("contacts")->get("email")->getData(),
             ];
            $cm->createClient($company,$contacts);
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
    public function editAction(Customer $company, Request $request,ClientManager $cm)
    {
        $formcompany = $this->createForm(CustomerType::class, $company);

        $formcompany->handleRequest($request);
        if ($formcompany->isSubmitted() && $formcompany->isValid()) {

            $contacts=[ $formcompany->get("contacts")->get("firstname")->getData(),
                $formcompany->get("contacts")->get("lastname")->getData(),
                $formcompany->get("contacts")->get("email")->getData(),
            ];
            $cm->editClient($company,$contacts);
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
    public function NewContactAction(Request $request,ContactManager $cm)
    {
        $idcompany=$request->query->get('id');
        $company=$this->em->getRepository(Customer::class)->find($idcompany);
        $contact = new Contact();
        $formcontact = $this->createForm(ContactDetailsType::class,$contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {

            $contact->setCustomer($company);
            $cm->createContact($contact);
            $this->addSuccessFlash();
           return $this->redirectToRoute('contact_list',["id"=>$idcompany]);
        }
        return $this->render('contact/new.html.twig',array('contact' => $formcontact->createView()));
    }

    /**
     * @Route("/contact/list/{id}", name="contact_list")
     *
     */
    public function ListContactAction(Customer $company , Request $request)
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
    public function editContactAction(Contact $contact, Request $request,ContactManager $cm)
    {

        $idcustomer=$contact->getCustomer()->getId();
        $formcontact = $this->createForm(ContactDetailsType::class, $contact);
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
            $cm->editContact($contact);
            $this->addSuccessFlash();
        }
        return $this->render('contact/edit.html.twig',
            array(
                'contact' => $formcontact->createView(),
                'idcustomer'=>$idcustomer
            ));
    }

    /**
     *  Deletes a Contact entity.
     *  @Route("/contact/{id}/delete", name="contact_delete")
     *  @Method("DELETE")
     */
    public function deleteContactAction(Request $request, Contact $contact,ContactManager $cm)
    {
        $idcompany=$contact->getCustomer()->getId();
        $form = $this->createContactDeleteForm($contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $cm->deleteContact($contact);
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
    public function newExcerciceAction(Request $request,FiscalManager $fs)
    {
        $excercice=new FiscalYear();
        $idcompany=$request->query->get('id');
        $company=$this->em->getRepository(Customer::class)->find($idcompany);
        $formexcercice = $this->createForm(FiscalDetailsType::class,$excercice);
        $formexcercice->handleRequest($request);
        if ($formexcercice->isSubmitted() && $formexcercice->isValid()) {
             $excercice->setCustomer($company);
             $fs->createFiscal($excercice);
             $this->addSuccessFlash();
            return $this->redirectToRoute('excerice_list',["id"=>$idcompany]);
        }
        return $this->render('excercice/new.html.twig',array('formexcercice' => $formexcercice->createView()));
    }

    /**
     * @Route("/excerice/list/{id}", name="excerice_list")
     *
     */
    public function listExcericeAction(Customer $company ,Request $request)
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
    public function editExcerciceAction(Request $request,FiscalYear $fiscalYear,FiscalManager $fs)
    {
        $idCompany=$fiscalYear->getCustomer()->getId();

        $formexcercice = $this->createForm(FiscalDetailsType::class, $fiscalYear);
        $formexcercice->handleRequest($request);
        if ($formexcercice->isSubmitted() && $formexcercice->isValid()) {

            $fs->editFiscal($fiscalYear);
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
    public function deleteExcerciceAction(Request $request, FiscalYear $fiscalYear,FiscalManager $fs)
    {
        $idcompany=$fiscalYear->getCustomer()->getId();
        $form = $this->createExcerciceDeleteForm($fiscalYear);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $fs->deleteFiscal($fiscalYear);
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

    /**
     * @Route("/invoice/list", name="invoice_list")
     *
     */
    public function listInvoiceAction()
    {

        return $this->render('invoices/list.html.twig');
    }

    /**
     * @Route("/invoice/new", name="invoice_new")
     *
     */
    public function newInvoiceAction()
    {

        return $this->render('invoices/new.html.twig');
    }

    /**
     * @Route("/invoice/edit/{id}", name="invoice_edit")
     *
     */
    public function editInvoiceAction()
    {

        return $this->render('invoices/edit.html.twig');
    }

    /**
     * @Route("/invoice/avoir/new", name="avoir_new")
     *
     */
    public function newAvoirAction()
    {

        return $this->render('invoices/avoir.html.twig');
    }

}
