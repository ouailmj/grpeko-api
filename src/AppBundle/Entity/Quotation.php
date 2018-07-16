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
 * Quotation.
 *
 * @ORM\Table(name="quotation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuotationRepository")
 */
class Quotation
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
     * @var MissionPurchase
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\MissionPurchase" ,mappedBy="quotation")
     */
    private $missionPurchase;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="quotations")
     */
    private $company;

    /**
     * @var TransmissionMode
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TransmissionMode")
     * @ORM\JoinColumn(name="transmission_mode_id", referencedColumnName="id")
     */
    private $transmissionMode;

    /**
     * @var QuotationLine [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="QuotationLine", mappedBy="quotation")
     */
    private $quotationLines;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $nbPurchaseInvoicPerYear;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     */
    private $nbSalesInvoicesPerYear;


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
     * @return MissionPurchase
     */
    public function getMissionPurchase(): MissionPurchase
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
     * @return TransmissionMode
     */
    public function getTransmissionMode(): TransmissionMode
    {
        return $this->transmissionMode;
    }

    /**
     * @param TransmissionMode $transmissionMode
     */
    public function setTransmissionMode(TransmissionMode $transmissionMode)
    {
        $this->transmissionMode = $transmissionMode;
    }

    /**
     * @return QuotationLine[]|ArrayCollection
     */
    public function getQuotationLines()
    {
        return $this->quotationLines;
    }

    /**
     * @param QuotationLine $quotationLines
     */
    public function setQuotationLines(QuotationLine $quotationLines)
    {
        $this->quotationLines = $quotationLines;
    }

    public function addQuotationLine(QuotationLine $quotationLines)
    {
        $this->quotationLines->add($quotationLines);

        return $this;
    }

    public function removeQuotationLine(QuotationLine $quotationLines)
    {
        return $this->quotationLines->removeElement($quotationLines);
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
     * @return string
     */
    public function getNbPurchaseInvoicPerYear()
    {
        return $this->nbPurchaseInvoicPerYear;
    }

    /**
     * @param string $nbPurchaseInvoicPerYear
     */
    public function setNbPurchaseInvoicPerYear(string $nbPurchaseInvoicPerYear)
    {
        $this->nbPurchaseInvoicPerYear = $nbPurchaseInvoicPerYear;
    }

    /**
     * @return string
     */
    public function getNbSalesInvoicesPerYear()
    {
        return $this->nbSalesInvoicesPerYear;
    }

    /**
     * @param string $nbSalesInvoicesPerYear
     */
    public function setNbSalesInvoicesPerYear(string $nbSalesInvoicesPerYear)
    {
        $this->nbSalesInvoicesPerYear = $nbSalesInvoicesPerYear;
    }


}
