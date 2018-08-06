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
use Symfony\Bundle\FrameworkBundle\Templating\EngineInterface;

class Mailer
{
    use ContactMailTrait, CustomerMailTrait;

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

    /**
     * Notifies a user that his account has been created.
     *
     * @param User $user
     */
    public function sendPasswordUpdatedMessage(User $user)
    {
        $subject = $this->translator->trans('mail.password_updated_header');
        $bodyMessage = $this->templateEngine->render(':mail/user:password_updated.html.twig', [
            'subject' => $subject,
            'email' => $user->getEmail(),
            'password' => $user->getPlainPassword(),
        ]);
        $this->sendEmailMessage($bodyMessage, $user->getEmail(), $subject);
    }
}
