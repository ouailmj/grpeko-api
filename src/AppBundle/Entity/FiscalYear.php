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
     * @ORM\Column(name="startDate", type="datetimetz",nullable=true)
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetimetz",nullable=true)
     */
    protected $closeDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10,nullable=true)
     */
    protected $status;

    /**
     * @var integer
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
     *
     */
    protected $taxSystem;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="fiscalYears" ,cascade={"persist"}))
     */
    protected $company;

    /**
     * @var Assignment
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Assignment" ,inversedBy="mainFiscalYear" ,cascade={"persist", "remove"}))
     */
    protected $mainAssignment;

    /**
     * @var Assignment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Assignment" ,mappedBy="secondaryFiscalYear" ,cascade={"persist", "remove"}))
     */
    protected $secondaryAssignments;


    /**
     * @var MissionPurchase
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\MissionPurchase", inversedBy="fiscalYears")
     */
    protected $missionPurchase;

    /**
     * @var Invoice []
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Invoice", mappedBy="fiscalYear")
     */
    protected $invoices;

    /**
     * FiscalYear constructor.
     *
     */
    public function __construct()
    {
        $this->secondaryAssignments = new ArrayCollection();
        $this->invoices = new ArrayCollection();
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
        return $this->mainAssignment;
    }

    /**
     * @param Assignment $assignment
     */
    public function setAssignment(Assignment $assignment)
    {
        $this->mainAssignment = $assignment;
    }

    /**
     * @return MissionPurchase
     */
    public function getMissionPurchase()
    {
        return $this->missionPurchase;
    }

    /**
     * @param MissionPurchase $missionPurchase
     */
    public function setMissionPurchase(MissionPurchase $missionPurchase)
    {
        $this->missionPurchase = $missionPurchase;
    }

    /**
     * @return Assignment
     */
    public function getMainAssignment()
    {
        return $this->mainAssignment;
    }

    /**
     * @param Assignment $mainAssignment
     */
    public function setMainAssignment(Assignment $mainAssignment)
    {
        $this->mainAssignment = $mainAssignment;
    }

    /**
     * @return Assignment[]|ArrayCollection
     */
    public function getSecondaryAssignments()
    {
        return $this->secondaryAssignments;
    }

    /**
     * @param Assignment[]|ArrayCollection $secondaryAssignments
     */
    public function setScondaryAssignments($secondaryAssignments)
    {
        $this->secondaryAssignments = $secondaryAssignments;
    }

    /**
     * @return Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param Invoice[] $invoices
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;
    }

    public function addInvoice(Invoice $invoice)
    {
        $this->invoices->add($invoice);

        return $this;
    }

    public function removeInvoice(Invoice $invoice)
    {
        return $this->invoices->removeElement($invoice);
    }

    public function addSecondaryAssignment(Assignment $assignment)
    {
        $this->secondaryAssignments->add($assignment);

        return $this;
    }

    public function removeSecondaryAssignment(Assignment $assignment)
    {
        return $this->secondaryAssignments->removeElement($assignment);
    }


}
