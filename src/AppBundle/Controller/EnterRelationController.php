<?php

namespace AppBundle\Controller;

use AppBundle\Entity\EnterRelation;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\Mission;
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

    /**
     * @Route("/add", name="relation_new")
     *
     */

    public function newAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $relationentre = new EnterRelation();
        $form1 = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);
        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {

            $date1=$form1->get('date1')->getData();
            $date2=$form1->get('date2')->getData();
            $date3=$form1->get('date3')->getData();
            $comment1=$form1->get('comment1')->getData();
            $comment2=$form1->get('comment2')->getData();
            $comment3=$form1->get('comment3')->getData();
            $comment4=$form1->get('comment4')->getData();
            $comment5=$form1->get('comment5')->getData();
            $fiscal1=[
                    "Date1"=>$date1,
                    "CA"=>["Valeur"=>$form1->get('date1text1')->getData(),"Commentaire"=>$comment1],
                    "Achats"=>[$form1->get('date1text2')->getData(),"Commentaire"=>$comment2],
                    "Bénifice"=>[$form1->get('date1text3')->getData(),"Commentaire"=>$comment3],
                    "Salariés"=>[$form1->get('date1text4')->getData(),"Commentaire"=>$comment4],
                    "Rémuniration"=>[$form1->get('date1text5')->getData(),"Commentaire"=>$comment5],
                    ];
            $fiscal2=[
                "Date2"=>$date2,
                "CA"=>["Valeur"=>$form1->get('date2text1')->getData(),"Commentaire"=>$comment1],
                "Achats"=>[$form1->get('date2text2')->getData(),"Commentaire"=>$comment2],
                "Bénifice"=>[$form1->get('date2text3')->getData(),"Commentaire"=>$comment3],
                "Salariés"=>[$form1->get('date2text4')->getData(),"Commentaire"=>$comment4],
                "Rémuniration"=>[$form1->get('date2text5')->getData(),"Commentaire"=>$comment5],
            ];
            $fiscal3=[
                "Date3"=>$date3,
                "CA"=>["Valeur"=>$form1->get('date3text1')->getData(),"Commentaire"=>$comment1],
                "Achats"=>[$form1->get('date3text2')->getData(),"Commentaire"=>$comment2],
                "Bénifice"=>[$form1->get('date3text3')->getData(),"Commentaire"=>$comment3],
                "Salariés"=>[$form1->get('date3text4')->getData(),"Commentaire"=>$comment4],
                "Rémuniration"=>[$form1->get('date3text5')->getData(),"Commentaire"=>$comment5],
            ];

            $FiscalYear1=new FiscalYear();
            $FiscalYear2=new FiscalYear();
            $FiscalYear3=new FiscalYear();

            $FiscalYear1->setExercicesComptables($fiscal1);
            $FiscalYear2->setExercicesComptables($fiscal2);
            $FiscalYear3->setExercicesComptables($fiscal3);


            $mission=new Mission();
            $mission->addExercice($FiscalYear1);
            $mission->addExercice($FiscalYear2);
            $mission->addExercice($FiscalYear3);

            $mission->setCompany($relationentre->getCompany());
            $mission->setTypeMission($relationentre->getTypeMission());
            $relationentre->getCompany()->addMission($mission);


            $relationentre->setSocieteactuelle(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

            $relationentre->setHolding(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

            $relationentre->setEpargne(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

            $em->persist($relationentre);
            $this->getDoctrine()->getManager()->flush();
            $this->addSuccessFlash();

            $this->redirectToRoute('relation_new');
        }

        return $this->render('prisedeconnaissance/entree_relation/new.html.twig', array('form1' => $form1->createView()));

    }

    /**
     * @Route("/edit/{id}", name="relation_edit")
     *
     */

    public function editAction(EnterRelation $relationentre,Request $request)
    {


        $em = $this->getDoctrine()->getManager();


        $form1 = $this->createForm('AppBundle\Form\EntreRelationType', $relationentre);
        $form1->handleRequest($request);

        if ($form1->isSubmitted() && $form1->isValid()) {

            $date1=$form1->get('date1')->getData();
            $date2=$form1->get('date2')->getData();
            $date3=$form1->get('date3')->getData();

            $comment1=$form1->get('comment1')->getData();
            $comment2=$form1->get('comment2')->getData();
            $comment3=$form1->get('comment3')->getData();
            $comment4=$form1->get('comment4')->getData();
            $comment5=$form1->get('comment5')->getData();

            $fiscal1=[
                "Date1"=>$date1,
                "CA"=>["Valeur"=>$form1->get('date1text1')->getData(),"Commentaire"=>$comment1],
                "Achats"=>[$form1->get('date1text2')->getData(),"Commentaire"=>$comment2],
                "Bénifice"=>[$form1->get('date1text3')->getData(),"Commentaire"=>$comment3],
                "Salariés"=>[$form1->get('date1text4')->getData(),"Commentaire"=>$comment4],
                "Rémuniration"=>[$form1->get('date1text5')->getData(),"Commentaire"=>$comment5],
            ];
            $fiscal2=[
                "Date2"=>$date2,
                "CA"=>["Valeur"=>$form1->get('date2text1')->getData(),"Commentaire"=>$comment1],
                "Achats"=>[$form1->get('date2text2')->getData(),"Commentaire"=>$comment2],
                "Bénifice"=>[$form1->get('date2text3')->getData(),"Commentaire"=>$comment3],
                "Salariés"=>[$form1->get('date2text4')->getData(),"Commentaire"=>$comment4],
                "Rémuniration"=>[$form1->get('date2text5')->getData(),"Commentaire"=>$comment5],
            ];
            $fiscal3=[
                "Date3"=>$date3,
                "CA"=>["Valeur"=>$form1->get('date3text1')->getData(),"Commentaire"=>$comment1],
                "Achats"=>[$form1->get('date3text2')->getData(),"Commentaire"=>$comment2],
                "Bénifice"=>[$form1->get('date3text3')->getData(),"Commentaire"=>$comment3],
                "Salariés"=>[$form1->get('date3text4')->getData(),"Commentaire"=>$comment4],
                "Rémuniration"=>[$form1->get('date3text5')->getData(),"Commentaire"=>$comment5],
            ];

            $FiscalYear1=new FiscalYear();
            $FiscalYear2=new FiscalYear();
            $FiscalYear3=new FiscalYear();

            $FiscalYear1->setExercicesComptables($fiscal1);
            $FiscalYear2->setExercicesComptables($fiscal2);
            $FiscalYear3->setExercicesComptables($fiscal3);


            $mission=new Mission();
            $mission->addExercice($FiscalYear1);
            $mission->addExercice($FiscalYear2);
            $mission->addExercice($FiscalYear3);

            $mission->setCompany($relationentre->getCompany());
            $mission->setTypeMission($relationentre->getTypeMission());
            $relationentre->getCompany()->addMission($mission);

            $relationentre->setSocieteactuelle(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

            $relationentre->setHolding(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

            $relationentre->setEpargne(
                array('epargne_date' => $form1->get('epargne_date')->getData(), 'epargne_check' => $form1->get('epargne_check')->getData())
            );

           foreach ($relationentre->getCompany()->getContacts() as $contact )
             {
                $contact->setCompany($relationentre->getCompany());
             }
            $em->flush();
            $this->addSuccessFlash();
            return $this->redirectToRoute('relation_edit' , ['id' => $relationentre->getId()]);
        }

        return $this->render('prisedeconnaissance/entree_relation/edit.html.twig',
                             array('form1' => $form1->createView()));

    }


}
