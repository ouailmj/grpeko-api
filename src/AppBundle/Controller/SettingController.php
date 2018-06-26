<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class SettingController
 *
 * @package AppBundle\Controller
 *
 * @Route("/setting")
 */
class SettingController extends Controller
{

    /**
     * @Route("/planning", name="setting_planning")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function planningAction()
    {
        return $this->render('setting/planning.html.twig');
    }

    /**
     * @Route("/emails", name="setting_emails")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function emailsAction()
    {
        return $this->render('setting/coming_soon.html.twig');
    }

    /**
     * @Route("/commissions", name="setting_commissions")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function commissionsAction()
    {
        return $this->render('setting/coming_soon.html.twig');
    }

    /**
     * @Route("/quotations", name="setting_quotations")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function quotationsAction()
    {
        return $this->render('setting/coming_soon.html.twig');
    }

    /**
     * @Route("/analytics", name="setting_analytics")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function analyticsAction()
    {
        return $this->render('setting/coming_soon.html.twig');
    }
}
