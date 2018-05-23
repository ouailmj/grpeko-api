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

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class MobileController extends BaseController
{
    
    //kamal
    /**
     * @Route("/login", name="login")
     * @param Request $request
     *  * @return \Symfony\Component\HttpFoundation\Response
     */
    public function Login(Request $request)
    {
        return $this->render('default/Mobile/login.html.twig');
    }
}