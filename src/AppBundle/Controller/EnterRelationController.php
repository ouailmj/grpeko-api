<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\Mission;
use AppBundle\Model\EnterRelationManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
/**
 * Class CompanyController
 * @package AppBundle\Controller
 * @Route("/relation")
 */

class EnterRelationController extends BaseController
{

    private  $relationManager;
    /**
     * EnterRelationController constructor.
     */
    public function __construct(EnterRelationManager $relationManager)
    {
        $this->relationManager= $relationManager;
    }
    
    /**
     * @Route("/add", name="relation_new")
     *
     */

    public function newAction(Request $request)
    {

        $relationentre = new EnterRelation();
        $formrelation = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);
        $formrelation->handleRequest($request);

        if ($formrelation->isSubmitted() && $formrelation->isValid()) {

            $this->relationManager->createRelation($formrelation,$relationentre);
            $this->addSuccessFlash();

            $this->redirectToRoute('relation_new');
        }

        return $this->render('prisedeconnaissance/entree_relation/new.html.twig', array('formrelation' => $formrelation->createView()));

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