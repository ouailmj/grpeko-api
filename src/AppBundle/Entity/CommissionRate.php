<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CommissionRate
 *
 * @ORM\Table(name="commission_rate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CommissionRateRepository")
 */
class CommissionRate
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
     * @ORM\Column(name="year", type="string", length=255)
     */
    private $year;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee", inversedBy="commissionRates")
     */
    private $employee;


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
     * Set year.
     *
     * @param string $year
     *
     * @return CommissionRate
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year.
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @return Employee
     */
    public function getEmployee(): Employee
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
