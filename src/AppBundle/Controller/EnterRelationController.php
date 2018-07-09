<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\Company;
use AppBundle\Model\ClientManager;
use AppBundle\Entity\Contact;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\Mission;
use AppBundle\Entity\Rendezvous;
use AppBundle\Model\EnterRelationManager;
use AppBundle\Model\RendezVousManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Event\AppEvents;
use AppBundle\Event\RendezVousCreatedEvent;
/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("/relation")
 */

class EnterRelationController extends BaseController
{

    private  $rendezVousManager;
    private $clientManager;
    /**
     * EnterRelationController constructor.
     */
    public function __construct(RendezVousManager $rendezVousManager,ClientManager $clientManager)
    {
        $this->rendezVousManager= $rendezVousManager;
        $this->clientManager= $clientManager;
    }


    /**
     *  @Route("/rendez-vous", name="rendezvous_new")
     */

    public function rendezVousAction(Request $request)
    {
        if ($request->isMethod('POST')) {

            try{
                $nom=$request->get("lastname");
                $email=$request->get("email");

                $data=["sujet"=>$request->get("sujet"),
                       "datedebut"=>$request->get("datedebut"),
                       "heuredebut"=>$request->get("heuredebut"),
                       "datefin"=>$request->get("datefin"),
                       "heurefin"=>$request->get("heurefin")
                ];
                $prospect=new Company();
                $contact=new Contact();
                $contact->setLastname($nom);
                $contact->setEmail($email);
                $prospect->addContact($contact);
                $this->clientManager->createClient($prospect);
                $this->get('event_dispatcher')->dispatch(AppEvents::RENDEZVOUS_CREATED, new RendezVousCreatedEvent($prospect,$data));
                $this->addSuccessFlash();

            }catch(Exception $e){

            }
        }

        return $this->render('prisedeconnaissance/entree_relation/rendez_vous.html.twig', array(

        ));
    }

    /**
     *  @Route("/uploadmodel", name="model_upload")
     */

    public function uploadmodel(Request $request)
    {

        $rendezvous = new Rendezvous();
        $formrendezvous = $this->createForm('AppBundle\Form\RendezVousType', $rendezvous);
        $formrendezvous->handleRequest($request);

        //TODO: Utiliser les mimetypes pour savoir les types des fichiers

        if ($formrendezvous->isSubmitted() && $formrendezvous->isValid()) {
                $cpt=0;
                $fiche = $rendezvous->getFichePatrimoniale();
                $cin = $rendezvous->getCin();
            if(!in_array($fiche->guessExtension(),["xlsx","xlsx"]) ){
                $error = new FormError("merci d'exporter un fichier excel !");
                $formrendezvous->get('FichePatrimoniale')->addError($error);
                $cpt=1;
            }
            if(!in_array($cin->guessExtension(),["jpg","jpeg","png","pdf"]) ){
                $error = new FormError("merci d'exporter une image ou un fichier pdf !");
                $formrendezvous->get('Cin')->addError($error);
                $cpt=1;
            }
            if($cpt==0)
            {
                $this->rendezVousManager->uploadFiles($rendezvous,$this->getParameter('files_directory'));
                $this->addSuccessFlash();
            }

            $this->redirectToRoute('model_upload');

        }

        return $this->render('prisedeconnaissance/entree_relation/upload_model.html.twig', array('rendezvous' => $formrendezvous->createView()));


    }
    
    /**
     * @Route("/devis", name="devis_new")
     *
     */

    public function newAction(Request $request)
    {

        $rendezvous = new Rendezvous();
        $formrendezvous = $this->createForm('AppBundle\Form\RendezVousType', $rendezvous);
        $formrendezvous->handleRequest($request);

        if ($formrendezvous->isSubmitted() && $formrendezvous->isValid()) {

            $this->redirectToRoute('devis_new');

        }

        return $this->render('prisedeconnaissance/entree_relation/new.html.twig', array('rendezvous' => $formrendezvous->createView()));

    }


    public function move(Rendezvous $rendezvous,string $fileName)
    {

        $rendezvous->getFichePatrimoniale()->move($this->getParameter('files_directory'), $fileName);
    }


    /**
     * @Route("/edit/{id}", name="relation_edit")
     *
     */

    public function editAction(EnterRelation $relationentre,Request $request)
    {

        $formrelation = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);
        $formrelation->handleRequest($request);

        if ($formrelation->isSubmitted() && $formrelation->isValid()) {

            $this->relationManager->createRelation($formrelation,$relationentre);
            $this->addSuccessFlash();
            return $this->redirectToRoute('relation_edit' , ['id' => $relationentre->getId()]);
        }

        return $this->render('prisedeconnaissance/entree_relation/edit.html.twig',
                             array('formrelation' => $formrelation->createView()));

    }

}