<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
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
    private $id;

    /**
     * @var JobPosition
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JobPosition", inversedBy="employees")
     */
    private $jobPosition;

    /**
     * @var Assignment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Assignment", mappedBy="employee")
     */
    private $assignments;

    /**
     * @var Employee
     *
     * @ORM\OneToOne(targetEntity="Employee")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id")
     */
    private $manager;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return JobPosition
     */
    public function getJobPosition(): JobPosition
    {
        return $this->jobPosition;
    }

    /**
     * @param JobPosition $jobPosition
     */
    public function setJobPosition(JobPosition $jobPosition)
    {
        $this->jobPosition = $jobPosition;
    }

    /**
     * @return Assignment[]|ArrayCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param $assignment
     * @return $this
     */
    public function addAssignments($assignment)
    {
        $this->assignments->add($assignment);
        return $this;
    }

    /**
     * @param $assignment
     * @return bool
     */
    public function removeAssignments($assignment)
    {
        return  $this->assignments->removeElement($assignment);

    }

    /**
     * @return Employee
     */
    public function getManager(): Employee
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



}
