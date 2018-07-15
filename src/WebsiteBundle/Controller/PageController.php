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

namespace WebsiteBundle\Controller;

use AppBundle\Mailer\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PageController extends WebsiteController
{
    /**
     * @Route("/")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction()
    {
        return $this->render('@Website/Page/home.html.twig');
    }

    /**
     * @Route("/contact")
     * @Method(methods={"POST"})
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function contactAction(Request $request)
    {
        $data = $this->getContactData($request);
        $this->get(Mailer::class)->sendContactMail($data);

        return $this->redirect($this->generateUrl('website_page_home'));
    }

    private function getContactData(Request $request)
    {
        $name = $request->request->get('name');
        $email = $request->request->get('email');
        $message = $request->request->get('message');

        return [
            'name' => $name,
            'email' => $email,
            'message' => $message,
        ];
    }
}
