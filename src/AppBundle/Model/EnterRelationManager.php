<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 6/28/18
 * Time: 22:31
 */

namespace AppBundle\Model;


use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\FiscalYear;
use AppBundle\Entity\Mission;

class EnterRelationManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /** @var  UserManager */
    private $userManager;


    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }


    public function createRelation($formrelation,$relationentre)
    {
        $date1=$formrelation->get('date1')->getData();
        $date2=$formrelation->get('date2')->getData();
        $date3=$formrelation->get('date3')->getData();
        $comment1=$formrelation->get('comment1')->getData();
        $comment2=$formrelation->get('comment2')->getData();
        $comment3=$formrelation->get('comment3')->getData();
        $comment4=$formrelation->get('comment4')->getData();
        $comment5=$formrelation->get('comment5')->getData();
        $fiscal1=[
            "Date1"=>$date1,
            "CA"=>["Valeur"=>$formrelation->get('date1text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date1text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date1text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date1text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date1text5')->getData(),"Commentaire"=>$comment5],
        ];
        $fiscal2=[
            "Date2"=>$date2,
            "CA"=>["Valeur"=>$formrelation->get('date2text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date2text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date2text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date2text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date2text5')->getData(),"Commentaire"=>$comment5],
        ];
        $fiscal3=[
            "Date3"=>$date3,
            "CA"=>["Valeur"=>$formrelation->get('date3text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date3text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date3text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date3text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date3text5')->getData(),"Commentaire"=>$comment5],
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
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $relationentre->setHolding(
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $relationentre->setEpargne(
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $this->em->persist($relationentre);
        $this->em->flush();
    }


    public function editRelation($formrelation,$relationentre)
    {
        $date1=$formrelation->get('date1')->getData();
        $date2=$formrelation->get('date2')->getData();
        $date3=$formrelation->get('date3')->getData();
        $comment1=$formrelation->get('comment1')->getData();
        $comment2=$formrelation->get('comment2')->getData();
        $comment3=$formrelation->get('comment3')->getData();
        $comment4=$formrelation->get('comment4')->getData();
        $comment5=$formrelation->get('comment5')->getData();
        $fiscal1=[
            "Date1"=>$date1,
            "CA"=>["Valeur"=>$formrelation->get('date1text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date1text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date1text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date1text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date1text5')->getData(),"Commentaire"=>$comment5],
        ];
        $fiscal2=[
            "Date2"=>$date2,
            "CA"=>["Valeur"=>$formrelation->get('date2text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date2text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date2text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date2text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date2text5')->getData(),"Commentaire"=>$comment5],
        ];
        $fiscal3=[
            "Date3"=>$date3,
            "CA"=>["Valeur"=>$formrelation->get('date3text1')->getData(),"Commentaire"=>$comment1],
            "Achats"=>[$formrelation->get('date3text2')->getData(),"Commentaire"=>$comment2],
            "Bénifice"=>[$formrelation->get('date3text3')->getData(),"Commentaire"=>$comment3],
            "Salariés"=>[$formrelation->get('date3text4')->getData(),"Commentaire"=>$comment4],
            "Rémuniration"=>[$formrelation->get('date3text5')->getData(),"Commentaire"=>$comment5],
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
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $relationentre->setHolding(
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $relationentre->setEpargne(
            array('epargne_date' => $formrelation->get('epargne_date')->getData(), 'epargne_check' => $formrelation->get('epargne_check')->getData())
        );

        $this->em->flush();
    }
}