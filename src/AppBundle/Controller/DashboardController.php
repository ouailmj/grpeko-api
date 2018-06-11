<?php

namespace AppBundle\Controller;

use AppBundle\Model\EmployeeManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homeAction(Request $request, EmployeeManager $employeeManager)
    {
        $employees = $employeeManager->findAllEmployees();

        return $this->render('dashboard/home.html.twig', array(
            'employees' => $employees
        ));
    }
}
