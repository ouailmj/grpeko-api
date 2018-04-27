<?php

/*
 * This file is part of the Napier project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends BaseController
{

    /**
     * @Route("/client/show", name="client_show")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showClientAction(Request $request)
    {
        return $this->render('default/client_show.html.twig');
    }

    /**
     * @Route("/client/edit", name="client_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editClientAction(Request $request)
    {
        return $this->render('default/client_edit.html.twig');
    }

    /**
     * @Route("/client/new", name="client_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newClientAction(Request $request)
    {
        return $this->render('default/client_new.html.twig');
    }

    /**
     * @Route("/contact_client/list", name="contact-client_list")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listContactClientAction(Request $request)
    {
        return $this->render('default/contact_client_index.html.twig');
    }

    /**
     * @Route("/contact_client/index", name="contact_client_index")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexContactClientAction(Request $request)
    {
        return $this->render('default/contact_client_index.html.twig');
    }

    /**
     * @Route("/contact_client/new", name="contact_client_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newContactClientAction(Request $request)
    {
        return $this->render('default/contact_client_new.html.twig');
    }

    /**
     * @Route("/contact_client/edit", name="contact_client_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editContactClientAction(Request $request)
    {
        return $this->render('default/contact_client_edit.html.twig');
    }

    /**
     * @Route("/contact_client/show", name="contact_client_show")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showContactClientAction(Request $request)
    {
        return $this->render('default/contact_client_show.html.twig');
    }

    /**
     * @Route("/dossier/new", name="dossier_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newDossierAction(Request $request)
    {
        return $this->render('default/dossier_new.html.twig');
    }

    /**
     * @Route("/dossier/edit", name="dossier_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editDossierAction(Request $request)
    {
        return $this->render('default/dossier_edit.html.twig');
    }

    /**
     * @Route("/dossier/show", name="dossier_show")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showDossierAction(Request $request)
    {
        return $this->render('default/dossier_show.html.twig');
    }

    /**
     * @Route("/relation_client/new", name="relation_client_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newRelationClientAction(Request $request)
    {
        return $this->render('default/relation_client_new.html.twig');
    }

    /**
     * @Route("/relation_client/edit", name="relation_client_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editRelationClientAction(Request $request)
    {
        return $this->render('default/relation_client_edit.html.twig');
    }

    /**
     * @Route("/relation_client/search", name="relation_client_search")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchRelationClientAction(Request $request)
    {
        return $this->render('default/relation_client_search.html.twig');
    }

    /**
     * @Route("/relation_client/show", name="relation_client_show")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showRelationClientAction(Request $request)
    {
        return $this->render('default/relation_client_show.html.twig');
    }

    /**
     * @Route("/product/new", name="product_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newProductAction(Request $request)
    {
        return $this->render('default/product_new.html.twig');
    }

    /**
     * @Route("/product/edit", name="product_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editProductAction(Request $request)
    {
        return $this->render('default/product_edit.html.twig');
    }

    /**
     * @Route("/product/listing", name="product_listing")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listingProductAction(Request $request)
    {
        return $this->render('default/product_listing.html.twig');
    }

    /**
     * @Route("/contrat/search", name="_contrat_search")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function searchContractAction(Request $request)
    {
        return $this->render('default/contrat_search.html.twig');
    }

    /**
     * @Route("/vehicule/list", name="vehicule_list")
     *tableau pour afficher les véhicules
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showVehiculeListAction(Request $request)
    {
        return $this->render('default/vehicule_list.html.twig');
    }

    /**
     * @Route("/product/list", name="product_list")
     *afficher la liste des produits
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProductListAction(Request $request)
    {
        return $this->render('default/product_list.html.twig');
    }

    /**
     * @Route("/product_family/list", name="product_family_list")
     *afficher la liste des familles de produits
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProductFamilyListAction(Request $request)
    {
        return $this->render('default/product_family_list.html.twig');
    }

    /**
     * @Route("/product_subscription/list", name="product_subscription_list")
     *tableau pour afficher les souscriptions de produits
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showProductSubscriptionListAction(Request $request)
    {
        return $this->render('default/product_subscription_list.html.twig');
    }

    /**
     * @Route("/record_step/index", name="record_step_index")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexRecordStepAction(Request $request)
    {
        return $this->render('default/record_step_index.html.twig');
    }

    /**
     * @Route("/record_step/edit", name="record_step_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editRecordStepAction(Request $request)
    {
        return $this->render('default/record_step_edit.html.twig');
    }

    /**
     * @Route("/record_step/new", name="record_step_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newRecordStepAction(Request $request)
    {
        return $this->render('default/record_step_new.html.twig');
    }

    /**
     * @Route("/contract/show", name="_contract_show")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showContractAction(Request $request)
    {
        return $this->render('default/contract_show.html.twig');
    }

    /**
     * @Route("/contract/edit", name="_contract_edit")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editContractAction(Request $request)
    {
        return $this->render('default/contrat_edit.html.twig');
    }

    /**
     * @Route("/contract/new", name="_contract_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newContractAction(Request $request)
    {
        return $this->render('default/contrat_new.html.twig');
    }

    /**
     * @Route("/portail/record/new", name="portail_record_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newRecordAction(Request $request)
    {
        return $this->render('default/record_new.html.twig');
    }



    /**************************************************/


    /**
     * @Route("/client/access1", name="client_access1")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accessClientAction(Request $request)
    {
        return $this->render('default/access1.html.twig');
    }


    /**
     * @Route("/", name="__homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('base.html.twig');

        // return $this->render('website/index.html.twig');
    }


    /**
     * @Route("/client/index", name="client_index")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexClientAction(Request $request)
    {
        return $this->render('default/client_index.html.twig');
    }


   /**
     * @Route("/client/entre_relation", name="client_entre_relation")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function clientRelationAction(Request $request)
    {
        return $this->render('default/client_entre_relation.html.twig');
    }


    /**
     * @Route("/client/rdvs", name="client_rdvs")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function rdvsAction(Request $request)
    {
        return $this->render('default/rdvs.html.twig');
    }


    /**
     * @Route("/client/rdvs/new", name="client_rdvs_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newRDVAction(Request $request)
    {
        return $this->render('default/client_rdv_new.html.twig');
    }

    /**
     * @Route("/client/contact", name="client_contact")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function clientContactAction(Request $request)
    {
        return $this->render('default/client_contact.html.twig');
    }


    /**
     * @Route("/client/contact/new", name="client_contact_new")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function newClientContactAction(Request $request)
    {
        return $this->render('default/client_contact_new.html.twig');
    }

    /**
     * @Route("/client/devis", name="Devis_client")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showDevisClient(Request $request)
    {
        return $this->render('default/Devis_clients.html.twig');
    }

    /**
     * @Route("/client/mission", name="Mission_client")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function MissionClient(Request $request)
    {
        return $this->render('default/Mission.html.twig');
    }

    /**
     * @Route("/client/showTable", name="showTable")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ShowTable(Request $request)
    {
        return $this->render('default/ShowTable.html.twig');
    }

}
