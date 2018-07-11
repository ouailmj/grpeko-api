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
 * FiscalYear.
 *
 * @ORM\Table(name="fiscal_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FiscalYearRepository")
 */
class FiscalYear
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime",nullable=true)
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetime",nullable=true)
     */
    protected $closeDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=20,nullable=true)
     */
    protected $status;

    /**
     * @var int
     *
     * @ORM\Column(type="integer",nullable=true)
     */
    protected $year;

    /**
     * Regime d'imposition.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $taxationRegime;

    /**
     * Regime TVA.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $vatSystem;

    /**
     * Regime Fiscal.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $taxSystem;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="fiscalYears" ,cascade={"persist", "remove"}))
     */
    protected $company;

    /**
     * @var Assignment
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Assignment" ,inversedBy="fiscalYear" ,cascade={"persist", "remove"}))
     */
    protected $assignment;

    /**
     * @var Mission
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mission", inversedBy="exercices")
     */
    protected $mission;

    /**
     * @var array
     *
     * @ORM\Column(type="array",nullable=TRUE))
     */
    protected $Exercices_comptables;

    /**
     * @return Mission
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @param Mission $mission
     */
    public function setMission(Mission $mission)
    {
        $this->mission = $mission;
    }

    /**
     * @return array
     */
    public function getExercicesComptables()
    {
        return $this->Exercices_comptables;
    }

    /**
     * @param array $Exercices_comptables
     */
    public function setExercicesComptables(array $Exercices_comptables)
    {
        $this->Exercices_comptables = $Exercices_comptables;
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
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return FiscalYear
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set closeDate.
     *
     * @param \DateTime $closeDate
     *
     * @return FiscalYear
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    /**
     * Get closeDate.
     *
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Set status.
     *
     * @param string $status
     *
     * @return FiscalYear
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getTaxationRegime()
    {
        return $this->taxationRegime;
    }

    /**
     * @param string $taxationRegime
     */
    public function setTaxationRegime(string $taxationRegime)
    {
        $this->taxationRegime = $taxationRegime;
    }

    /**
     * @return string
     */
    public function getVatSystem()
    {
        return $this->vatSystem;
    }

    /**
     * @param string $vatSystem
     */
    public function setVatSystem(string $vatSystem)
    {
        $this->vatSystem = $vatSystem;
    }

    /**
     * @return string
     */
    public function getTaxSystem()
    {
        return $this->taxSystem;
    }

    /**
     * @param string $taxSystem
     */
    public function setTaxSystem(string $taxSystem)
    {
        $this->taxSystem = $taxSystem;
    }

    /**
     * @return int
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param int $year
     */
    public function setYear(int $year)
    {
        $this->year = $year;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Assignment
     */
    public function getAssignment()
    {
        return $this->assignment;
    }

    /**
     * @param Assignment $assignment
     */
    public function setAssignment(Assignment $assignment)
    {
        $this->assignment = $assignment;
    }
}
