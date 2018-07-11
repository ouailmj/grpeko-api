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

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MobileController extends BaseController
{
    //kamal

    /**
     * @Route("mobile/login", name="login")
     *
     * @param Request $request
     *
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function LoginAction(Request $request)
    {
        return $this->render('default/Mobile/login.html.twig');
    }

    /**
     * @Route("mobile/conversationlist", name="conversation_list")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listConversationAction(Request $request)
    {
        return $this->render('default/mobile/conversation_list.html.twig');
    }

    /**
     * @Route("mobile/conversationadd", name="conversation_add")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addConversationAction(Request $request)
    {
        return $this->render('default/conversation_add.html.twig');
    }

    /**
     * @Route("mobile/conversationdetails", name="conversationdetails")
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function detailConversationAction(Request $request)
    {
        return $this->render('default/mobile/conversation_details.html.twig');
    }
}
