<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 *  @ApiResource()
 */
class Employee extends Person   
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
     * @var JobPosition
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JobPosition", inversedBy="employees")
     * @ORM\JoinColumn(name="job_position_id", referencedColumnName="id", nullable=true)
     */
    private $jobPosition;


    /*
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $initials;

    /**
     * @var Assignment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Assignment", mappedBy="employee")
     */
    private $assignments;

    /**
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="manager")
     */
    private $staffs;

    /**
     * @ORM\ManyToOne(targetEntity="Employee", inversedBy="staffs")
     * @ORM\JoinColumn(name="manager_id", referencedColumnName="id", onDelete="SET NULL")
     */
    private $manager;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        $this->staffs = new ArrayCollection();
    }


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
    public function getJobPosition()
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
     * @return mixed
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param mixed $initials
     */
    public function setInitials($initials)
    {
        $this->initials = $initials;
    }

    /**
     * @return mixed
     */
    public function getStaffs()
    {
        return $this->staffs;
    }

    /**
     * @param mixed $staffs
     */
    public function setStaffs($staffs)
    {
        $this->staffs = $staffs;
    }


    public function addStaff(Employee $employee)
    {
        $this->staffs->add($employee);
        return $this;
    }

    public function removeStaff(Employee $employee)
    {
        return $this->staffs->removeElement($employee);

    }

}
