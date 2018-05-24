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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
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
     * afficher la liste des familles de produits.
     *
     * @Route("/product_family/list", name="product_family_list")
     * afficher la liste des familles de produits
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
     * tableau pour afficher les souscriptions de produits.
     *
     * @Route("/product_subscription/list", name="product_subscription_list")
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

    /**
     * @Route("/client/planning", name="planning")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Planning(Request $request)
    {
        return $this->render('default/Planning.html.twig');
    }

    /**
     * @Route("/client/gestion-cabinet", name="gestion-cabinet")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Gestion_cabinet(Request $request)
    {
        return $this->render('default/gestion-cabinet.html.twig');
    }

    /**
     * @Route("/client/comptabilite", name="comptabilite")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function comptabilite(Request $request)
    {
        return $this->render('default/comptabilite.html.twig');
    }

    /**
     * @Route("/client/exercices", name="client_excercices")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ExcerciceClient(Request $request)
    {
        return $this->render('default/client_excercice.html.twig');
    }

    /**
     * @Route("/client/collaborateurs", name="collaborateurs")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function collaborateurs(Request $request)
    {
        return $this->render('default/gestion-collaborateurs.html.twig');
    }

    /**
     * @Route("/client/add-collaborateur", name="add-collaborateur")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addCollaborateur(Request $request)
    {
        return $this->render('default/Add-collaborateurs.html.twig');
    }

    /**
     * @Route("/client/view-collaborateur", name="view-collaborateur")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function viewCollaborateur(Request $request)
    {
        return $this->render('default/view_collaborateur.html.twig');
    }

    /**
     * @Route("/conversationlists", name="conversation_listss")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listconversation(Request $request)
    {
        return $this->render('default/conversation_list.html.twig');
    }

    /**
     * @Route("/conversationadds", name="conversation_adds")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addconversation(Request $request)
    {
        return $this->render('default/conversation_add.html.twig');
    }

    /**
     * @Route("/client/edit-collaborateur", name="edit-collaborateur")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function editCollaborateur(Request $request)
    {
        return $this->render('default/edit_collaborateur.html.twig');
    }

    /**
     * @Route("/client/accueill", name="accueill")

     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function accueill(Request $request)
    {
        return $this->render('default/accueill.html.twig');
    }

  //kamal
    /**
     * @Route("/client/information_generale", name="information_generale")
    
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function informationGenerale(Request $request)
    {
        return $this->render('default/information_generale.html.twig');
    }
    //kamal
    /**
     * @Route("/client/parametrage_devis", name="parametrage_devis")
    
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function parametrageDevis(Request $request)
    {
        return $this->render('default/parametrages_devis.html.twig');
    }


    //kamal
    /**
     * @Route("/client/parametrage_commissions", name="commissions")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
      public function parametrageCommissions(Request $request)
    {
        return $this->render('default/parametrages_commission.html.twig');
    }
    /**
     * @Route("/cabinetacess", name="cabinet_access")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function cabinetacess(Request $request)
    {
        return $this->render('default/cabinet_access.html.twig');
    }

        //kamal
    /**
     * @Route("/client/parametrage_email", name="email")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function parametrageEmail(Request $request)
    {
        return $this->render('default/parametrages_emails.html.twig');
    }

        //kamal
    /**
     * @Route("/client/parametrage_internet", name="Sites_internet")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function parametrageInternet(Request $request)
    {
        return $this->render('default/parametrages_internetsite.html.twig');
    }

     //kamal
    /**
     * @Route("/client/parametrage_rendezvous", name="Rendez_vouz")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function parametrageRendezVous(Request $request)
    {
        return $this->render('default/parametrages_rendezvous.html.twig');
    }
     //kamal
    /**
     * @Route("/client/info-bancaire", name="InfoBancaire")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function InfoBancaire(Request $request)
    {
        return $this->render('default/Client_info_bancaires.html.twig');
    }
             //kamal
    /**
     * @Route("/client/formalites", name="formalites")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Formalites(Request $request)
    {
        return $this->render('default/Formalités.html.twig');
    }
     //kamal
    /**
     * @Route("/client/parametrages", name="parametrages")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Parametrages(Request $request)
    {
        return $this->render('default/Parametrages.html.twig');
    }

     //kamal
    /**
     * @Route("/client/affecctaionCollaborateurF", name="affecctaionCollaborateur")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function affecctaionCollaborateur(Request $request)
    {
        return $this->render('default/collaborateur_affectation.html.twig');
    }
     //kamal
    /**
     * @Route("/client/gestion_comptabilite", name="gestion_comptabilite")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function gestionComptabilite(Request $request)
    {
        return $this->render('default/gestion_comptabilité.html.twig');
    }


    /**
     * @Route("/client/grandlivre", name="grandlivre")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function grandLivre(Request $request)
    {
        return $this->render('default/grand_livre.html.twig');
    }

    /**
     * @Route("/client/etatFinancier", name="etatFinancier")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function etatFinancier(Request $request)
    {
        return $this->render('default/etats_financiers.html.twig');
    }

    /**
     * @Route("/client/comptabilite1", name="comptabilite1")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function comptablite_1(Request $request)
    {
        return $this->render('default/comptablite_1.html.twig');
    }

    /**
     * @Route("/client/balancegeneral", name="balancegeneral")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function balance_general(Request $request)
    {
        return $this->render('default/balance_general.html.twig');
    }

      //kamal
    /**
     * @Route("/client/administratifNote", name="administratifNote")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AdministratifNote(Request $request)
    {
        return $this->render('default/Administratif.html.twig');
    }
     //kamal
    /**
     * @Route("/client/lettredespense", name="lettredespense")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function LettreDespense(Request $request)
    {
        return $this->render('default/lettrededespense.html.twig');
    }
     //kamal
    /**
     * @Route("/client/attestationNonremu", name="attestationNonremu")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AttestationNonRemu(Request $request)
    {
        return $this->render('default/attestationNonremuneration.html.twig');
    }

     //kamal
    /**
     * @Route("/client/attestationMiniprevisionel", name="attestationMiniprevisionel")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function AttestationMiniPrevisionel(Request $request)
    {
        return $this->render('default/attestationMiniprevisionel.html.twig');
    }

     //kamal
    /**
     * @Route("/client/fiscalite", name="fiscalite")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Fiscalite(Request $request)
    {
        return $this->render('default/fiscalite.html.twig');
    }

    //kamal
    /**
     * @Route("/client/calculeis", name="calculeis")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Calculeis(Request $request)
    {
        return $this->render('default/Fcalculeis.html.twig');
    }

    //kamal
    /**
     * @Route("/client/importcfonb", name="importcfonb")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Importcfonb(Request $request)
    {
        return $this->render('default/importCFONB.html.twig');
    }

      //kamal
    /**
     * @Route("/client/suiviceb", name="suiviceb")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Suiviceb(Request $request)
    {
        return $this->render('default/SuiviCEB.html.twig');
    }

    /**
     * @Route("/client/cabinetcompte", name="cabinetcompte")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Cabinetcompte(Request $request)
    {
        return $this->render('default/cabinet_compte.html.twig');
    }

    /**
     * @Route("/client/cabinetjournaux", name="cabinetjournaux")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Cabinetjournaux(Request $request)
    {
        return $this->render('default/cabinet_journaux.html.twig');
    }
    /**
     * @Route("/client/conversationsdetails", name="detail_conv")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailConversationAction(Request $request)
    {
        return $this->render('default/conversation_details.html.twig');
    }


    /**
    * @Route("/conversation", name="conversation")
    *
    * @param Request $request
    *
    * @return \Symfony\Component\HttpFoundation\Response
    */
    public function Conversation(Request $request)
    {
        return $this->render('default/conversation.html.twig');
    }
}
