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

namespace AppBundle\Mailer;

use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Event\RendezVousCreatedEvent;
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;
use AppBundle\Event\ClientCreatedEvent;

class Mailer
{
    /** @var \Swift_Mailer */
    private $mailer;

    private $fromEmail;

    private $fromName;

    private $adminMail;

    /** @var EngineInterface */
    private $templateEngine;

    /**
     * Mailer constructor.
     *
     * @param \Swift_Mailer $mailer
     * @param $fromEmail
     * @param $fromName
     */
    public function __construct(\Swift_Mailer $mailer, $fromEmail, $fromName, EngineInterface $templateEngine, $adminMail)
    {
        $this->mailer = $mailer;
        $this->fromEmail = $fromEmail;
        $this->fromName = $fromName;
        $this->templateEngine = $templateEngine;
        $this->adminMail = $adminMail;
    }

    protected function sendEmailMessage($body, $toEmail, $subject)
    {
        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setFrom($this->fromEmail, $this->fromName)
            ->setTo($toEmail)
            ->setBody($body)
            ->setContentType('text/html');

        $this->mailer->send($message);
    }

    public function sendContactMail(array $submittedData)
    {
        $body = $this->templateEngine->render('mail/website/contact.html.twig', $submittedData);

        $this->sendEmailMessage($body, $this->adminMail, 'Groupe EKO - Un message de contact');
    }


    public function sendEmailCLient(RendezVousCreatedEvent $prospect)
    {
        $email=$prospect->getProspect()->getCustomerAccount()->getUserAccount()->getEmail();
        $password=$prospect->getProspect()->getCustomerAccount()->getUserAccount()->getPlainPassword();
        $name=$prospect->getProspect()->getContacts()[0]->getLastname();
        $sujet=$prospect->getData()["sujet"];
        $datedebut=$prospect->getData()["datedebut"];
        $heuredebut=$prospect->getData()["heuredebut"];

        $bodymessage = $this->templateEngine->render('mail/relation/rendezvous.html.twig', array(
            'name'   => $name,
            'datedebut'     => $datedebut,
            'heuredebut'     => $heuredebut,
            'email'  => $email,
            'password'  => $password,
        ));

        $this->sendEmailMessage($bodymessage,$email,$sujet);
    }

}
