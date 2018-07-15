<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Group
 *
 * @ORM\Table(name="group")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupRepository")
 */
class Group
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
     * @var Employee [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Employee", mappedBy="group")
     */
    private $employees;

    /**
     * Group constructor.
     *
     */
    public function __construct()
    {
        $this->employees = new ArrayCollection();
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
     * @return mixed
     */
    public function removeEmployee(Employee $employee)
    {
        return $this->employees->removeElement($employee);
    }
}
