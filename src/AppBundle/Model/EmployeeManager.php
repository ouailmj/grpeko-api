<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 03/08/17
 * Time: 09:27 م
 */

namespace AppBundle\Model;


use AppBundle\Entity\Employee;
use AppBundle\Entity\User;
use AppBundle\Mailer\Mailer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\VarDumper\VarDumper;

class EmployeeManager
{
    /**
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
