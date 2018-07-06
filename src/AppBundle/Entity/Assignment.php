<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Assignment
 *
 * @ORM\Table(name="assignment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssignmentRepository")
 */
class Assignment
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
     * @var FiscalYear
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FiscalYear" ,mappedBy="assignment"))
     */
    protected $fiscalYear;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee" ,inversedBy="assignments"))
     */
    protected $employee;

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
     * @return FiscalYear
     */
    public function getFiscalYear()
    {
        return $this->fiscalYear;
    }

    /**
     * @param FiscalYear $fiscalYear
     */
    public function setFiscalYear(FiscalYear $fiscalYear)
    {
        $this->fiscalYear = $fiscalYear;
    }

    /**
     * @return Employee
     */
    public function getEmployee()
    {
        return $this->employee;
    }

    /**
     * @param Employee $employee
     */
    public function setEmployee(Employee $employee)
    {
        $this->employee = $employee;
    }


}
