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
 * Class Employee.
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
     * @var Employee [] | ArrayCollection
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $initials;

    /**
     * @var JobPosition [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\JobPosition", inversedBy="employees")
     */
    private $jobPositions;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstName;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastName;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $birthDate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $deathDate = null;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $phoneNumber;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $faxNumber;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $postalCode;

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
     *
     * @return $this
     */
    public function addAssignment(Assignment $assignment)
    {
        $this->assignments->add($assignment);

        return $this;
    }

    /**
     * @param Assignment $assignment
     *
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
    public function setManager(self $manager)
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
     *
     * @return $this
     */
    public function addStaff(self $employee)
    {
        $this->staff->add($employee);

        return $this;
    }

    /**
     * @param Employee $employee
     *
     * @return bool
     */
    public function removeStaff(self $employee)
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
     *
     * @return $this
     */
    public function addJobPosition(JobPosition $jobPosition)
    {
        $this->jobPositions->add($jobPosition);

        return $this;
    }

    /**
     * @param JobPosition $jobPosition
     *
     * @return bool
     */
    public function removeJobPosition(JobPosition $jobPosition)
    {
        return  $this->jobPositions->removeElement($jobPosition);
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
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return \DateTime
     */
    public function getDeathDate()
    {
        return $this->deathDate;
    }

    /**
     * @param \DateTime $deathDate
     */
    public function setDeathDate(\DateTime $deathDate)
    {
        $this->deathDate = $deathDate;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $faxNumber
     */
    public function setFaxNumber(string $faxNumber)
    {
        $this->faxNumber = $faxNumber;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }
}
