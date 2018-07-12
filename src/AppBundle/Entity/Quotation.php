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
     * @var CustomerStatus
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerStatus", inversedBy="quotations")
     */
    private $customerStatus;

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
     * @return CustomerStatus
     */
    public function getCustomerStatus(): CustomerStatus
    {
        return $this->customerStatus;
    }

    /**
     * @param CustomerStatus $customerStatus
     */
    public function setCustomerStatus(CustomerStatus $customerStatus)
    {
        $this->customerStatus = $customerStatus;
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
}
