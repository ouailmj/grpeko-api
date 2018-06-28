<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EmployeeRepository")
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
     * @var status
     * @ORM\Column(name="status", type="boolean", nullable=true,options={"default" : 0})
     */
    protected $status;
    /**
     * @var EnterRelation [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\EnterRelation", mappedBy="contributor")
     */
    private $enterRelations;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $initials;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $entryDate;

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
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $Status
     */
    public function setStatus(bool $status)
    {
        $this->status = $status;
    }
    /**
     * @return EnterRelation[]|ArrayCollection
     */
    public function getEnterRelations()
    {
        return $this->enterRelations;
    }

    /**
     * @param $enterRelation
     * @return $this
     */
    public function addEnterRelation($enterRelation)
    {
        $this->enterRelations->add($enterRelation);
        return $this;
    }

    /**
     * @param $enterRelation
     * @return bool
     */
    public function removeEnterRelation($enterRelation)
    {
        return  $this->enterRelations->removeElement($enterRelation);

    }

    /**
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param string $initials
     *
     * @return Employee
     */
    public function setInitials(string $initials)
    {
        $this->initials = $initials;

        return $this;
    }

    public function __toString()
    {
        return $this->initials;
    }

    /**
     * @ORM\PrePersist()
     */
    public function setInitialsValue()
    {
        if (empty($this->initials)){
            $this->initials = strtoupper(substr($this->getFirstName(), 0, 4));
        }

        if (empty($this->initials)){
            $this->initials = strtoupper(substr($this->getLastName(), 0, 4));
        }
    }
}
