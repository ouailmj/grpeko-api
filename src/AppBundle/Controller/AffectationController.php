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

use AppBundle\Entity\Company;
use AppBundle\Entity\Employee;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Affectation controller.
 *
 * @Route("affectation")
 */
class AffectationController extends BaseController
{
    /**
     * Lists all company entities.
     *
     *
     * @Route("/", name="affectation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $employee = new Employee();
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm('AppBundle\Form\EmployeeType', $employee);
        $em = $this->getDoctrine()->getManager();
        $employee = $em->getRepository('AppBundle:Employee')->findAll();
        $company = $em->getRepository('AppBundle:Company')->findAll();

        return $this->render('affectation/index.html.twig', [
            'company' => $company,
            'employee' => $employee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * affectation all company entities.
     *
     * @Route("/affect", name="affect")
     * @Method("GET")
     */
    public function affectationAction(Request $request)
    {
        $id = $request->query->get('id');

        $allvals = $request->query->get('allVals');

        $employeeManager = $this->getDoctrine()->getManager();

        $employee = $employeeManager->getRepository(Employee::class)->findById($id);
        $employeeManager->flush();

        $entityManager = $this->getDoctrine()->getManager();
        $companys = $entityManager->getRepository(Company::class)->findById($allvals);

        /**
         * @var Company
         */
        foreach ($companys as $coco) {
            $coco->getFiscalYears()->last()->getAssignment()->setEmployee($employee[0]);
        }

        $entityManager->flush();

        return new JsonResponse('Votre opération a été exécutée avec succès');
    }

    /**
     * Lists all company entities.
     *
     *
     * @Route("/chiffer", name="chiffer_index")
     * @Method("GET")
     */
    public function chifferAction()
    {
        $repository = $this->getDoctrine()
            ->getRepository(Company::class);

        $query = $repository->createQueryBuilder('c')
                ->getQuery();
        $companys = $query->getResult();
        dump($companys);
        die;

        return $this->render('affectadtion/chiffer_affaire.html.twig', [
            'companys' => $companys,
        ]);
    }
}
