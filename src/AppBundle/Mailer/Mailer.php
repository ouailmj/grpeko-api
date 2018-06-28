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


    public function sendEmailCLient(ClientCreatedEvent $client)
    {
        $email=$client->getCompany()->getCustomerAccount()->getUserAccount()->getEmail();
        $password=$client->getCompany()->getCustomerAccount()->getUserAccount()->getPlainPassword();
        $name=$client->getCompany()->getCustomerAccount()->getName();

        $message = (new \Swift_Message())
            ->setSubject("Fiche Patrimoniale")
            ->setFrom("groupeekofr.dev@gmail.com")
            ->setTo($email)
            ->setBody("
            <html>Bonjour, $name <br><br>Afin de préparer ce rdv, merci de me retourner cette  <a href='/app/relation/add'>fiche patrimoniale</a> remplie stp.<br>
            <h3>Authentification :</h3>
               Email:$email<br>
               Password:$password
            </html>");

        $this->mailer->send($message);
    }

}
