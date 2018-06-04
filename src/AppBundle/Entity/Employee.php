<?php

namespace AppBundle\Entity;

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
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
