<?php
namespace AppBundle\Controller;
use AppBundle\Entity\Address;
use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Customer;
use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\User;
use AppBundle\Form\CompanyType;
use AppBundle\Model\ClientManager;
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
class CompanyController extends BaseController
{
    private  $clientManager;
    private $em;
    /**
     * CompanyController constructor.
     */
    public function __construct(ClientManager $clientManager, EntityManager $em)
    {
        $this->clientManager= $clientManager;
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
     *
     */
    public function newAction(Request $request)
    {
        $company = new Company();
        $formcompany = $this->createForm('AppBundle\Form\CompanyType', $company, array(
            'add_contact_data' => false,
        ));
        $formcompany->handleRequest($request);
        if ($formcompany->isSubmitted() && $formcompany->isValid()) {
            $this->clientManager->createClient($company,$formcompany);
            //   $this->get('event_dispatcher')->dispatch(AppEvents::CLIENT_CREATED, new ClientCreatedEvent($company));
            $this->addSuccessFlash();
            $this->redirectToRoute('company_new');
        }
        return $this->render('company/new.html.twig',
            array('formcompany' => $formcompany->createView()));
    }
    /**
     * @Route("/contact/new", name="contact_new")
     *
     */
    public function NewContactAction(Request $request)
    {
        $contact = new Contact();
        $formcontact = $this->createForm('AppBundle\Form\ContactDetailsType',$contact);
        $formcontact->handleRequest($request);
        if ($formcontact->isSubmitted() && $formcontact->isValid()) {
            //   $this->em->persist($contact);
            //  $this->em->flush();
            //  $this->clientManager->createClient($company,$formcompany);
            //   $this->get('event_dispatcher')->dispatch(AppEvents::CLIENT_CREATED, new ClientCreatedEvent($company));
            // $this->addSuccessFlash();
            $this->redirectToRoute('contact_list');
        }
        return $this->render('contact/new.html.twig',array('contact' => $formcontact->createView()));
    }
    /**
     * @Route("/contact/list", name="contact_list")
     *
     */
    public function ListContactAction(Request $request)
    {
        $contacts= $this->em->getRepository('AppBundle:Contact')->findAll();
        return $this->render('contact/list.html.twig',array("contacts"=>$contacts));
    }
    /**
     * @Route("/edit/{id}", name="company_edit")
     *
     */
    public function editAction(Company $company, Request $request)
    {
        $formcompany = $this->createForm('AppBundle\Form\CompanyType', $company);
        $formcompany->handleRequest($request);
        if ($formcompany->isSubmitted() && $formcompany->isValid()) {
            $this->clientManager->editClient();
            $this->addSuccessFlash();
        }
        return $this->render('company/edit.html.twig',
            array('formcompany' => $formcompany->createView()));
    }
}