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

use Doctrine\ORM\Mapping as ORM;

/**
 * Assignment.
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FiscalYear" ,mappedBy="mainAssignment"))
     */
    protected $mainFiscalYear;

    /**
     * @var FiscalYear
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FiscalYear" ,inversedBy="secondaryAssignments"))
     */
    protected $secondaryFiscalYear;

    /**
     * @var Employee
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee" ,inversedBy="assignments"))
     */
    protected $employee;

    /**
     * @var TypeMission
     *
     * @ORM\ManyToOne(targetEntity="TypeMission")
     * @ORM\JoinColumn(name="type_mission_id", referencedColumnName="id")
     */
    private $typeMission;

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
    public function getMainFiscalYear()
    {
        return $this->mainFiscalYear;
    }

    /**
     * @param FiscalYear $mainFiscalYear
     */
    public function setMainFiscalYear(FiscalYear $mainFiscalYear)
    {
        $this->mainFiscalYear = $mainFiscalYear;
    }

    /**
     * @return FiscalYear
     */
    public function getSecondaryFiscalYear()
    {
        return $this->secondaryFiscalYear;
    }

    /**
     * @param FiscalYear $secondaryFiscalYear
     */
    public function setSecondaryFiscalYear(FiscalYear $secondaryFiscalYear)
    {
        $this->secondaryFiscalYear = $secondaryFiscalYear;
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

    /**
     * @return mixed
     */
    public function getTypeMission()
    {
        return $this->typeMission;
    }

    /**
     * @param mixed $typeMission
     */
    public function setTypeMission($typeMission)
    {
        $this->typeMission = $typeMission;
    }


}
