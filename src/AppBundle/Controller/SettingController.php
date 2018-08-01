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

use AppBundle\Entity\Mode;
use AppBundle\Entity\TransmissionMode;
use AppBundle\Form\TransmissionModeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class SettingController.
 *
 *
 * @Route("/setting")
 */
class SettingController extends BaseController
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
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function quotationsAction(Request $request)
    {
        $modeTransmission = new TransmissionMode();
        $em = $this->getDoctrine()->getManager();
        $modes = $em->getRepository(TransmissionMode::class)->findAll();
        $delete_forms = [];
        foreach ($modes as $mode) {
            $delete_forms[] = $this->createFormBuilder()
                ->setAction($this->generateUrl('mode_delete', ['id' => $mode->getId()]))
                ->setMethod('DELETE')
                ->getForm()->createView()
                ;
        }
        $form = $this->createForm(TransmissionModeType::class, $modeTransmission);
        $form->handleRequest($request);
        if ($form->isValid() && $form->isSubmitted()) {
            $em->persist($modeTransmission);
            $em->flush();
            $this->addSuccessFlash();

            return $this->redirectToRoute('setting_quotations');
        }

        return $this->render('setting/quotations.html.twig', [
            'mode' => $modes,
            'form' => $form->createView(),
            'delete_forms' => $delete_forms,
        ]);
    }

    /**
     * @Route("/delete/mode-transmission/{id}", name="mode_delete")
     * @Method("DELETE")
     *
     * @param Request          $request
     * @param TransmissionMode $mode
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteTransmissionModeAction(Request $request, Mode $mode)
    {
        $em = $this->getDoctrine()->getManager();
        $em->remove($mode);
        $em->flush();
        $this->addSuccessFlash();

        return $this->redirectToRoute('setting_quotations');
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
