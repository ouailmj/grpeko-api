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


namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Employee
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Employee
{


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Assignment [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Assignment", mappedBy="employee")
     */
    private $assignments;


    /**
     * @var Employee  [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="manager")
     */
    private $staff;

    /**
     * @var Employee
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="staff")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
    private $manager;

    /**
     * @var JobPosition  [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\JobPosition", inversedBy="employees")
     */
    private $jobPositions;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        $this->assignments = new ArrayCollection();
        $this->staff = new ArrayCollection();
        $this->jobPositions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Assignment[]|ArrayCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param Assignment[]|ArrayCollection $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }


    /**
     * @param Assignment $assignment
     * @return $this
     */
    public function addAssignment(Assignment $assignment)
    {
        $this->assignments->add($assignment);
        return $this;
    }

    /**
     * @param Assignment $assignment
     * @return bool
     */
    public function removeAssignment(Assignment $assignment)
    {
        return $this->assignments->removeElement($assignment);
    }

    /**
     * @return Employee
     */
    public function getManager()
    {
        return $this->manager;
    }

    /**
     * @param Employee $manager
     */
    public function setManager(Employee $manager)
    {
        $this->manager = $manager;
    }

    /**
     * @return Employee[]|ArrayCollection
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * @param Employee[]|ArrayCollection $staff
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;
    }

    /**
     * @param Employee $employee
     * @return $this
     */
    public function addStaff(Employee $employee)
    {
        $this->staff->add($employee);
        return $this;
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function removeStaff(Employee $employee)
    {
        return  $this->staff->removeElement($employee);
    }

    /**
     * @return JobPosition[]|ArrayCollection
     */
    public function getJobPositions()
    {
        return $this->jobPositions;
    }

    /**
     * @param JobPosition[]|ArrayCollection $jobPositions
     */
    public function setJobPositions($jobPositions)
    {
        $this->jobPositions = $jobPositions;
    }


    /**
     * @param JobPosition $jobPosition
     * @return $this
     */
    public function addJobPosition(JobPosition $jobPosition)
    {
        $this->jobPositions->add($jobPosition);
        return $this;
    }

    /**
     * @param JobPosition $jobPosition
     * @return bool
     */
    public function removeJobPosition(JobPosition $jobPosition)
    {
        return  $this->jobPositions->removeElement($jobPosition);
    }



}