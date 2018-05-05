<?php

namespace WebsiteBundle\Controller;

use AppBundle\Mailer\Mailer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;

class PageController extends WebsiteController
{
    /**
     * @Route("/")
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function homeAction()
    {
        return $this->render('@Website/Page/home.html.twig');
    }

    /**
     * @Route("/contact")
     * @Method(methods={"POST"})
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
            'name'      => $name,
            'email'     => $email,
            'message'   => $message
        ];
    }
}
