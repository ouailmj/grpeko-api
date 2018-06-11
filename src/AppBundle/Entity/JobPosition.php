<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * JobPosition
 *
 * @ORM\Table(name="job_position")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobPositionRepository")
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
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var ArrayCollection | Employee[]
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Employee", mappedBy="jobPosition")
     */
    private $employees;


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
     * Set name.
     *
     * @param string $name
     *
     * @return JobPosition
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Employee[]|ArrayCollection
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * @param $employee
     * @return $this
     */
    public function addEmployee($employee)
    {
        $this->employees->add($employee);
        return $this;

    }

    /**
     * @param $employee
     * @return bool
     */
    public function removeEmployee($employee)
    {
        return  $this->employees->removeElement($employee);

    }

    public function __toString()
    {
        return $this->name;
    }
}
