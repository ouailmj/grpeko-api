<?php
/**
 * Created by PhpStorm.
 * User: Bijotri
 * Date: 03/07/2018
 * Time: 15:57
 */

namespace AppBundle\Controller;
use AppBundle\Entity\FiscalYear;
use AppBundle\Form\FiscalType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
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
        return $this->render('fiscal/fiscal.html.twig', array(
            'fiscalyear' => $fiscalyear,
            'form' => $form->createView(),
        ));
    }
}