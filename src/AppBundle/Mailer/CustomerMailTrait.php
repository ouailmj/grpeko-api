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

namespace AppBundle\Mailer;

use AppBundle\Event\RendezVousCreatedEvent;

trait CustomerMailTrait
{
    public function sendEmailClient(RendezVousCreatedEvent $prospect)
    {
        $data = $this->prepareProspectData($prospect);

        $bodymessage = $this->templateEngine->render('mail/relation/rendezvous.html.twig', ['data' => $data]);

        $this->sendEmailMessage($bodymessage, $data['email'], $data['sujet']);
    }

    private function prepareProspectData(RendezVousCreatedEvent $rendezVous)
    {
        $prospect = $rendezVous->getProspect();

        $startH = $rendezVous->getData()['heuredebut'];
        $endH = $rendezVous->getData()['heurefin'];
        $phone = $rendezVous->getData()['phone'];
        $companyName = empty($rendezVous->getData()['company_name']) ? $rendezVous->getData()['nom'] : $rendezVous->getData()['company_name'];
        $subject = $companyName. ' - RDV COMMERCIAL - '. $startH . ' ' . $endH . ' - ' . $phone;

        return [
            'password' => $rendezVous->getProspect()->getUser()->getPlainPassword(),
            'email' => $rendezVous->getData()['email'],
            'name' => $rendezVous->getData()['nom'],
            'sujet' => (empty($rendezVous->getData()['sujet']) ? $subject : $rendezVous->getData()['sujet']),
            'datedebut' => $rendezVous->getData()['datedebut'],
            'heuredebut' => $rendezVous->getData()['heuredebut'],
            'heurefin' => $rendezVous->getData()['heurefin'],
            'customerid' => $rendezVous->getProspect()->getId(),
        ];
    }
}
