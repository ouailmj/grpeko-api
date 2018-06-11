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

    /**
     * EmployeeManager constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function findAllEmployees()
    {
        return $this->em->getRepository(Employee::class)->findAll();
    }

    public function createEmployee(Employee $employee, User $user = null)
    {
        if ($user instanceof User) $employee->setUserAccount($user);

        $this->em->persist($employee);
        $this->em->flush();
    }

    public function saveEmployee(Employee $employee)
    {

    }
}

