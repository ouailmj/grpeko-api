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
 * CustomerStatus.
 *
 * @ORM\Table(name="customer_status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerStatusRepository")
 */
class CustomerStatus
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
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;

    /**
     * @var Quotation [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="customerStatus")
     */
    private $quotations;

    /**
     * @var QuotationLine [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="QuotationLine",  mappedBy="customerStatus")
     */
    private $quotationLines;

    /**
     * @var Invoice [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="customerStatus")
     */
    private $invoices;

    /**
     * @var Company
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="customerStatus" ,cascade={"persist", "remove"}))
     */
    private $company;

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
     * Set status.
     *
     * @param string $status
     *
     * @return CustomerStatus
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
     * @return Quotation[]|ArrayCollection
     */
    public function getQuotations()
    {
        return $this->quotations;
    }

    /**
     * @param Quotation[]|ArrayCollection $quotations
     */
    public function setQuotations($quotations)
    {
        $this->quotations = $quotations;
    }

    public function addQuotation(Quotation $quotation)
    {
        $this->quotations->add($quotation);

        return $this;
    }

    public function removeQuotation(Quotation $quotation)
    {
        return $this->quotations->removeElement($quotation);
    }

    /**
     * @return QuotationLine[]|ArrayCollection
     */
    public function getQuotationLines()
    {
        return $this->quotationLines;
    }

    /**
     * @param QuotationLine[]|ArrayCollection $quotationLines
     */
    public function setQuotationLines($quotationLines)
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
     * @return Invoice[]|ArrayCollection
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param Invoice[]|ArrayCollection $invoices
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
}
