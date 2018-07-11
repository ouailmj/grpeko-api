<?php

/*
 * This file is part of the Moddus project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Event\AppEvents;
use AppBundle\Event\ClientCreatedEvent;
use AppBundle\Model\ClientManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompanyController.
 *
 * @Route("company")
 */
class CompanyController extends BaseController
{
    private $clientManager;

    /**
     * CompanyController constructor.
     */
    public function __construct(ClientManager $clientManager)
    {
        $this->clientManager = $clientManager;
    }

    /**
     * @Route("/list", name="company_index")
     */
    public function indexAction(Request $request)
    {
        $companys = $this->clientManager->findAllClients();
        $listcompanys = [];
        foreach ($companys as $company) {
            array_push($listcompanys, $this->createDeleteForm($company)->createView());
        }

        return $this->render('company/show.html.twig', [
            'companys' => $companys,
            'delete_form' => $listcompanys,
        ]);
    }

    /**
     * Deletes a Company entity.
     *
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
            ->setAction($this->generateUrl('company_delete', ['id' => $company->getId()]))
            ->setMethod('DELETE')
            ->getForm()
            ;
    }

    /**
     * @Route("/new", name="company_new")
     */
    public function newAction(Request $request)
    {
        $company = new Company();
        $formcompany = $this->createForm('AppBundle\Form\CompanyType', $company, [
            'add_contact_data' => false,
        ]);

        $formcompany->handleRequest($request);

        if ($formcompany->isSubmitted() && $formcompany->isValid()) {
            $this->clientManager->createClient($company, $formcompany);
            //   $this->get('event_dispatcher')->dispatch(AppEvents::CLIENT_CREATED, new ClientCreatedEvent($company));
            $this->addSuccessFlash();
            $this->redirectToRoute('company_new');
        }

        return $this->render('company/new.html.twig',
                            ['formcompany' => $formcompany->createView()]);
    }

    /**
     * @Route("/edit/{id}", name="company_edit")
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
                            ['formcompany' => $formcompany->createView()]);
    }
}
