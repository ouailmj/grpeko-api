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
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * Employee.
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
 * @ApiResource()
 * @ORM\HasLifecycleCallbacks()
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JobPosition", inversedBy="employees",cascade={"persist"})
     * @ORM\JoinColumn(name="job_position_id", referencedColumnName="id", nullable=true)
     */
    private $jobPosition;


    /**
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
     * @var boolean
     * @ORM\Column(name="status", type="boolean", nullable=true)
     */
    protected $status = false;


    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $entryDate;

    /**
     * @var CommissionRate [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CommissionRate", mappedBy="employee")
     */
    private $commissionRates;

    /**
     * @var Group
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Group", inversedBy="employees")
     */
    private $group;

    /**
     * Employee constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->staffs = new ArrayCollection();
        $this->commissionRates = new ArrayCollection();
    }

    /**
     * @return \DateTime
     */
    public function getEntryDate()
    {
        return $this->entryDate;
    }

    /**
     * @param \DateTime $entryDate
     */
    public function setEntryDate($entryDate)
    {
        $this->entryDate = $entryDate;
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
     *
     * @return $this
     */
    public function addAssignments($assignment)
    {
        $this->assignments->add($assignment);

        return $this;
    }

    /**
     * @param $assignment
     *
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

    /**
     * @return bool
     */
    public function isStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }

    /**
     * @return CommissionRate[]|ArrayCollection
     */
    public function getCommissionRates()
    {
        return $this->commissionRates;
    }

    /**
     * @param CommissionRate[]|ArrayCollection $commissionRates
     */
    public function setCommissionRates($commissionRates)
    {
        $this->commissionRates = $commissionRates;
    }


    /**
     * @param CommissionRate $commissionRate
     * @return $this
     */
    public function addCommissionRate(CommissionRate $commissionRate)
    {
        $this->commissionRates->add($commissionRate);
        return $this;
    }

    /**
     * @param CommissionRate $commissionRate
     * @return bool
     */
    public function removeEmployee(CommissionRate $commissionRate)
    {
        return $this->commissionRates->removeElement($commissionRate);
    }

    /**
     * @return Group
     */
    public function getGroup(): Group
    {
        return $this->group;
    }

    /**
     * @param Group $group
     */
    public function setGroupe(Group $group)
    {
        $this->group = $group;
    }


}
