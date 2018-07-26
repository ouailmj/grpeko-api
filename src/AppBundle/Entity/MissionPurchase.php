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
 * MissionPurchase.
 *
 * @ORM\Table(name="mission_purchase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionPurchaseRepository")
 */
class MissionPurchase
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetime")
     */
    private $closeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastFiscalEndDate", type="datetime")
     */
    private $lastFiscalEndDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstFiscalStartDate", type="datetime")
     */
    private $firstFiscalStartDate;

    /**
     * @var Quotation
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Quotation" ,inversedBy="missionPurchase")
     */
    protected $quotation;


    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="missionPurchase")
     */
    private $fiscalYears;

    /**
     * MissionPurchase constructor.
     */
    public function __construct()
    {
        $this->fiscalYears = new ArrayCollection();
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
     * @return MissionPurchase
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
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return MissionPurchase
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set closeDate.
     *
     * @param \DateTime $closeDate
     *
     * @return MissionPurchase
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
     * Set lastFiscalEndDate.
     *
     * @param \DateTime $lastFiscalEndDate
     *
     * @return MissionPurchase
     */
    public function setLastFiscalEndDate($lastFiscalEndDate)
    {
        $this->lastFiscalEndDate = $lastFiscalEndDate;

        return $this;
    }

    /**
     * Get lastFiscalEndDate.
     *
     * @return \DateTime
     */
    public function getLastFiscalEndDate()
    {
        return $this->lastFiscalEndDate;
    }

    /**
     * Set firstFiscalStartDate.
     *
     * @param \DateTime $firstFiscalStartDate
     *
     * @return MissionPurchase
     */
    public function setFirstFiscalStartDate($firstFiscalStartDate)
    {
        $this->firstFiscalStartDate = $firstFiscalStartDate;

        return $this;
    }

    /**
     * Get firstFiscalStartDate.
     *
     * @return \DateTime
     */
    public function getFirstFiscalStartDate()
    {        return $this->firstFiscalStartDate;
    }

    /**
     * @return FiscalYear[]|ArrayCollection
     */
    public function getFiscalYear()
    {
        return $this->fiscalYears;
    }

    /**
     * @param array $fiscalYears
     */
    public function setFiscalYear(array $fiscalYears)
    {
        $this->fiscalYears = $fiscalYears;
    }

    /**
     * @param FiscalYear $fiscalYear
     * @return $this
     */
    public function addFiscalYear(FiscalYear $fiscalYear)
    {
        $this->fiscalYears->add($fiscalYear);
        return $this;
    }

    /**
     * @param FiscalYear $fiscalYear
     * @return bool
     */
    public function removeFiscalYear(FiscalYear $fiscalYear)
    {
        return $this->fiscalYears->removeElement($fiscalYear);
    }

    /**
     * @return Quotation
     */
    public function getQuotation()
    {
        return $this->quotation;
    }

    /**
     * @param Quotation $quotation
     */
    public function setQuotation(Quotation $quotation)
    {
        $this->quotation = $quotation;
    }

    /**
     * @return FiscalYear[]|ArrayCollection
     */
    public function getFiscalYears()
    {
        return $this->fiscalYears;
    }

    /**
     * @param FiscalYear[]|ArrayCollection $fiscalYears
     */
    public function setFiscalYears($fiscalYears)
    {
        $this->fiscalYears = $fiscalYears;
    }


}
