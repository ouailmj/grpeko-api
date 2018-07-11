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

use AppBundle\Entity\Employee;
use AppBundle\Model\EmployeeManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Employee controller.
 *
 * @Route("employee")
 */
class EmployeeController extends BaseController
{
    /**
     * Lists all employee entities.
     *
     *@Security("has_role('ROLE_ADVISORY')")
     *
     * @Route("/", name="employee_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $employees = $em->getRepository('AppBundle:Employee')->findAll();

        return $this->render('employee/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * Creates a new employee entity.
     *
     *@Security("has_role('ROLE_ADVISORY')")
     *
     *
     * @Route("/new", name="employee_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request, EmployeeManager $employeeManager)
    {
        $employee = new Employee();
        $form = $this->createForm('AppBundle\Form\EmployeeType', $employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            if (!empty($plainPassword = $form->get('userAccount')->get('password')->getData())) {
                $employee->getUserAccount()->setPlainPassword($plainPassword);
            }

            $employeeManager->createEmployee($employee);

            $this->addSuccessFlash();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');
        }

        return $this->render('employee/new.html.twig', [
            'employee' => $employee,
            'form' => $form->createView(),
        ]);
    }

    /**
     * Finds and displays a employee entity.
     *
     *@Security("has_role('ROLE_ADVISORY')")
     *
     * @Route("/{id}", name="employee_show")
     * @Method("GET")
     */
    public function showAction(Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);

        return $this->render('employee/show.html.twig', [
            'employee' => $employee,
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    //@Security("has_role('ROLE_ADVISORY')")

    /**
     * Displays a form to edit an existing employee entity.
     *
     *@Security("has_role('ROLE_ADVISORY')")
     *
     *
     * @Route("/{id}/edit", name="employee_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('AppBundle\Form\EmployeeType', $employee, ['user' => false]);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');

            return $this->redirectToRoute('employee_show', ['id' => $employee->getId()]);
        }

        return $this->render('employee/edit.html.twig', [
            'employee' => $employee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Deletes a employee entity.
     *
     *
     *
     * @Route("/{id}", name="employee_delete")
     * @Method({"DELETE", "GET", "POST"})
     */
    public function deleteAction(Request $request, Employee $employee)
    {
        $form = $this->createDeleteForm($employee);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employee);
            $em->flush();
        } else {
            $em = $this->getDoctrine()->getManager();
            $em->remove($employee);
            $em->flush();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');
        }

        return $this->redirectToRoute('employee_index');
    }

    /**
     * Displays a form to edit an existing employee entity.
     *
     *
     * @Route("/{id}/password-edit", name="employeePassword_edit")
     * @Method({"GET", "POST"})
     */
    public function editPasswordAction(Request $request, Employee $employee)
    {
        $deleteForm = $this->createDeleteForm($employee);
        $editForm = $this->createForm('AppBundle\Form\EmployePasswordType', $employee);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();
            $this->addFlash('success', 'Votre opération a été exécutée avec succès');

            return $this->redirectToRoute('employee_show', ['id' => $employee->getId()]);
        }

        return $this->render('employee/edit-password.html.twig', [
            'employee' => $employee,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ]);
    }

    /**
     * Creates a form to delete a employee entity.
     *
     * @param Employee $employee The employee entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Employee $employee)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('employee_delete', ['id' => $employee->getId()]))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
