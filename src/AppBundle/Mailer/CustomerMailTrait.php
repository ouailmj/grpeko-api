<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/27/18
 * Time: 11:08
 */

namespace AppBundle\Mailer;


use AppBundle\Entity\Customer;
use AppBundle\Event\RendezVousCreatedEvent;

trait CustomerMailTrait
{

    public function sendEmailClient(RendezVousCreatedEvent $prospect)
    {
        $data=$this->prepareProspectData($prospect);

        $bodymessage = $this->templateEngine->render('mail/relation/rendezvous.html.twig', ["data"=>$data]);

        $this->sendEmailMessage($bodymessage, $data["email"], $data["sujet"]);
    }

    private function prepareProspectData(RendezVousCreatedEvent $rendezVous)
    {
        return array(
            'password' => $rendezVous->getProspect()->getUser()->getPlainPassword(),
            'email' => $rendezVous->getData()['email'],
            'name' =>  $rendezVous->getData()['nom'],
            'sujet' => $rendezVous->getData()['sujet'],
            'datedebut' => $rendezVous->getData()['datedebut'],
            'heuredebut' => $rendezVous->getData()['heuredebut'],
            'heurefin' => $rendezVous->getData()['heurefin'],
            'customerid'=>$rendezVous->getProspect()->getId(),
        );
    }
}