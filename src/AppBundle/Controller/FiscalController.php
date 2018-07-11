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

use AppBundle\Entity\FiscalYear;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Company controller.
 *
 * @Route("fiscal")
 */
class FiscalController extends BaseController
{
    /**
     * Creates a new company entity.
     *
     *
     * @Route("/", name="fiscal")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $fiscalyear = new FiscalYear();
        $form = $this->createForm('AppBundle\Form\FiscalType', $fiscalyear);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($fiscalyear);
            $em->flush();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');
        }

        return $this->render('fiscal/fiscal.html.twig', [
            'fiscalyear' => $fiscalyear,
            'form' => $form->createView(),
        ]);
    }
}
