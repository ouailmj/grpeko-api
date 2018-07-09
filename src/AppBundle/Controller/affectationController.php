<?php
/**
 * Created by PhpStorm.
 * User: Bijotri
 * Date: 13/06/2018
 * Time: 14:12
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Company;
use AppBundle\Entity\Employee;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Model\EmployeeManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Affectation controller.
 *
 * @Route("affectation")
 */
class affectationController extends BaseController
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

        return $this->render('affectation/index.html.twig', array(
            'company' => $company,
            'employee'     => $employee,
            'form' => $form->createView(),
        ));
    }

    /**
     * affectation all company entities.
     *
     * @Route("/affect", name="affect")
     * @Method("GET")
     */
    public function affectationAction(Request $request)
    {
        $id = 8;
//        $name=$request->query->get('name');
//        $company = $this->getDoctrine()
//            ->getRepository(Company::class)
//            ->find($name);
//
//        if (!$company) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$name
//            );
//        }
//        return new JsonResponse($company->getLegalName());
        $entityManager = $this->getDoctrine()->getManager();
        $company = $entityManager->getRepository(Company::class)->find($id);

        if (!$company) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
//        ->getAssignment()->getEmployee()
        foreach ($company->getFiscalYears() as $coco){
//        $reponse = $company->getFiscalYears()->getAssignment()->getEmployee();
        dump(
            $coco ->getAssignment()->getEmployee()
        );
            $entityManager->flush();
        die;
     }
       $entityManager->flush();

        return new JsonResponse($reponse);

        // return $this->redirect($this->generateUrl('listing'));
//        $em = $this->getDoctrine()->getManager();
//        $id = $em->getRepository('AppBundle\Entity\Company')->find($id);
//
//        if (!$id) {
//            throw $this->createNotFoundException('Unable to find Demand entity.');
//        }
//
//        $id->setStatusstatus = ('20');
//        $em->persist($id);
//        $em->flush();
    }




}
