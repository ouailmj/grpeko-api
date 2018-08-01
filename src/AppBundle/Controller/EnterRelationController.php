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
use AppBundle\Entity\Contact;
use AppBundle\Entity\Customer;
use AppBundle\Entity\Rendezvous;
use AppBundle\Event\AppEvents;
use AppBundle\Event\RendezVousCreatedEvent;
use AppBundle\Form\RendezVousType;
use AppBundle\Model\ClientManager;
use AppBundle\Model\RendezVousManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CompanyController.
 *
 * @Route("/relation")
 */
class EnterRelationController extends BaseController
{
    private $rendezVousManager;
    private $clientManager;
    private $em;

    /**
     * EnterRelationController constructor.
     */
    public function __construct(RendezVousManager $rendezVousManager, ClientManager $clientManager, EntityManagerInterface $em)
    {
        $this->rendezVousManager = $rendezVousManager;
        $this->clientManager = $clientManager;
        $this->em = $em;
    }

    /**
     *  @Route("/rendez-vous", name="rendezvous_new")
     */
    public function rendezVousAction(Request $request)
    {
        if ($request->isMethod('POST')) {
            $data = $this->getAppointementinfos($request);
            $prospect = new Customer();
            $prospect->addContact($this->newContact($data));
            $this->clientManager->createClient($prospect);
            $this->get('event_dispatcher')->dispatch(AppEvents::RENDEZVOUS_CREATED, new RendezVousCreatedEvent($prospect, $data));
            $this->addSuccessFlash();
        }

        return $this->render('prisedeconnaissance/entree_relation/rendez_vous.html.twig');
    }

    public function newContact(array $data)
    {
        $contact = new Contact();
        $contact->setLastname($data['nom']);
        $contact->setEmail($data['email']);

        return $contact;
    }

    public function getAppointementinfos(Request $request)
    {
        return ['sujet'     => $request->get('sujet'),
            'datedebut'     => $request->get('datedebut'),
            'heuredebut'    => $request->get('heuredebut'),
            'heurefin'      => $request->get('heurefin'),
            'nom'           => $request->get('lastname'),
            'email'         => $request->get('email'),
            'phone'         => $request->get('phone'),
            'company_name'  => $request->get('company_name')
        ];
    }

    /**
     *  @Route("/uploadmodel/{company}", name="model_upload")
     */
    public function uploadmodel(Customer $company, Request $request)
    {
        $rendezvous = new Rendezvous();
        $formrendezvous = $this->createForm(RendezVousType::class, $rendezvous);
        $formrendezvous->handleRequest($request);

        //TODO: Utiliser les mimetypes pour savoir les types des fichiers

        if ($formrendezvous->isSubmitted() && $formrendezvous->isValid()) {
            $cpt = 0;
            $fiche = $rendezvous->getFichePatrimoniale();
            $cin = $rendezvous->getCin();
            $this->checkFicheExtension($fiche, $formrendezvous);
            $this->checkCinExtension($cin, $formrendezvous);
            if (0 === $cpt) {
                $test = $this->rendezVousManager->uploadFiles($company, $rendezvous, $this->getParameter('files_directory'));
                0 === $test ? $this->addSuccessFlash() : $this->addErrorFlash();
            }

            $this->redirectToRoute('model_upload', ['company' => $company->getId()]);
        }

        return $this->render('prisedeconnaissance/entree_relation/upload_model.html.twig', ['rendezvous' => $formrendezvous->createView()]);
    }

    public function checkFicheExtension($fiche, $formrendezvous)
    {
        if (!in_array($fiche->guessExtension(), ['xlsx', 'xlsx'], true)) {
            $error = new FormError("merci d'exporter un fichier excel !");
            $formrendezvous->get('FichePatrimoniale')->addError($error);
            $cpt = 1;
        }
    }

    public function checkCinExtension($cin, $formrendezvous)
    {
        if (!in_array($cin->guessExtension(), ['jpg', 'jpeg', 'png', 'pdf'], true)) {
            $error = new FormError("merci d'exporter une image ou un fichier pdf !");
            $formrendezvous->get('Cin')->addError($error);
            $cpt = 1;
        }
    }

    /**
     * @Route("/contactemailcheck", name="emailcontactcheck")
     * @Method("GET")
     */
    public function uniqueContactEmailCheck(Request $request)
    {
        $email = $request->query->get('email');
        $cpt = $this->em->getRepository(Contact::class)->findByEmail($email);

        return new JsonResponse($cpt);
    }
}
