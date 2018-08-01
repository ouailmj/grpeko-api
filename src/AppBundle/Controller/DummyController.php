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

use AppBundle\Mailer\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DummyController extends Controller
{
    /**
     * @Route("test-email")
     */
    public function testEmailAction(Mailer $mailer)
    {
        $mailer->sendDummyMessage();

        return $this->render('AppBundle:Dummy:test_email.html.twig', [
            // ...
        ]);
    }
}
