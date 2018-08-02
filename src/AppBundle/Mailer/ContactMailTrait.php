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

trait ContactMailTrait
{
    public function sendContactMail(array $submittedData)
    {
        $body = $this->templateEngine->render('mail/website/contact.html.twig', $submittedData);

        $this->sendEmailMessage($body, $this->adminMail, 'Groupe EKO - Un message de contact');
    }
}
