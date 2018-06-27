<?php
/**
 * Created by PhpStorm.
<<<<<<< HEAD
 * User: mohamed
 * Date: 03/08/17
 * Time: 09:27 م
=======
 * User: Ahamada
 * Date: 09/06/2018
 * Time: 10:08
>>>>>>> 837075a85e2619f1b41efc2c5535aab40015b83a
 */

namespace AppBundle\Model;


use AppBundle\Entity\Employee;
use AppBundle\Entity\User;

use Doctrine\ORM\EntityManagerInterface;

class EmployeeManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /** @var  UserManager */
    private $userManager;

    /**
     * EmployeeManager constructor.
     * @param UserManager $userManager
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em,  UserManager $userManager)
    {
        $this->userManager = $userManager;
        $this->em = $em;
    }

    public function findAllEmployees()
    {
        return $this->em->getRepository(Employee::class)->findAll();
    }

    public function createEmployee(Employee $employee, User $user = null)
    {
        if ($employee->getUserAccount() instanceof User)
            $this->userManager->createUser($employee->getUserAccount(), false);

        $this->em->persist($employee);
        $this->em->flush();
    }

    public function saveEmployee(Employee $employee)
    {

    }
}

