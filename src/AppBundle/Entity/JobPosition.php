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
 * Class JobPosition
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="job_position")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobPositionRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class JobPosition
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
     * @var Employee  [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Employee", mappedBy="jobPositions")
     */
    private $employees;

/**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
    /**
     * JobPosition constructor.
     */
    public function __construct()
    {
        $this->employees = new ArrayCollection;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Employee[]|ArrayCollection
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param Employee[]|ArrayCollection $employees
     */
    public function setEmployees($employees)
    {
        $this->employees = $employees;
    }

    /**
     * @param Employee $employee
     * @return $this
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees->add($employee);
        return $this;
    }

    /**
     * @param Employee $employee
     * @return bool
     */
    public function removeEmployee(Employee $employee)
    {
        return $this->employees->removeElement($employee);
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



}