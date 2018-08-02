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
 * Class Assignment.
 *
 *
 *
 * @ORM\Table(name="assignment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssignmentRepository")
 *
 * @ORM\HasLifecycleCallbacks()
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
    protected $id;

    /**
     * @var TypeMission [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="TypeMission", inversedBy="assignments")
     */
    private $typeMissions;

    /**
     * @var FiscalYear
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="mainAssignment")
     */
    private $mainFiscalYear;

    /**
     * @var FiscalYear
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FiscalYear", inversedBy="secondaryAssignments")
     */
    private $secondaryFiscalYear;

    /**
     * @var Employee
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee", inversedBy="assignments")
     */
    private $employee;

    /**
     * Assignment constructor.
     */
    public function __construct()
    {
        $this->typeMissions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return TypeMission[]|ArrayCollection
     */
    public function getTypeMissions()
    {
        return $this->typeMissions;
    }

    /**
     * @param TypeMission[]|ArrayCollection $typeMissions
     */
    public function setTypeMissions($typeMissions)
    {
        $this->typeMissions = $typeMissions;
    }

    /**
     * @param TypeMission $typeMission
     *
     * @return $this
     */
    public function addTypeMission(TypeMission $typeMission)
    {
        $this->typeMissions->add($typeMission);

        return $this;
    }

    /**
     * @param TypeMission $typeMission
     *
     * @return $this
     */
    public function removeTypeMission(TypeMission $typeMission)
    {
        return  $this->typeMissions->removeElement($typeMission);
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
}
