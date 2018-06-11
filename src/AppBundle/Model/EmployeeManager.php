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
<<<<<<< HEAD
use AppBundle\Mailer\Mailer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\VarDumper\VarDumper;
=======
use Doctrine\ORM\EntityManagerInterface;
>>>>>>> 837075a85e2619f1b41efc2c5535aab40015b83a

class EmployeeManager
{
    /**
<<<<<<< HEAD
     * @var UserManager
     */
    private $userManager;


    /**
     * @var EntityManager
     */
    private $em;


    /**
     * UserManager constructor.
     * @param UserManager $userManager
     * @param EntityManager $em
     */
    public function __construct(UserManager $userManager,EntityManager $em)
    {
        $this->userManager = $userManager;
        $this->em = $em;
    }


    /**
     * Create new user in the database.
     *
     * @param Employee $employer
     */
    public function createEmployee(Employee $employer)
    {
       $this->userManager->createUser($employer->getUserAccount(), false);
        $this->em->persist($employer);
        $this->em->flush();
    }



  


 
}
=======
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
>>>>>>> 837075a85e2619f1b41efc2c5535aab40015b83a
