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

    /** @var UserManager */
    private $userManager;

    /**
     * EmployeeManager constructor.
     *
     * @param UserManager            $userManager
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em, UserManager $userManager)
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
        if ($employee->getUserAccount() instanceof User) {
            $this->userManager->createUser($employee->getUserAccount(), false);
        }

        $this->em->persist($employee);
        $this->em->flush();
    }

    public function saveEmployee(Employee $employee)
    {
    }
}
