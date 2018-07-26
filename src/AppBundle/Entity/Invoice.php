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
 * Invoice.
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @var Company
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="invoices")
     */
    private $company;

    /**
     * @var FiscalYear
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FiscalYear", inversedBy="invoices")
     */
    private $fiscalYear;

    /**
     * @var InvoiceLine [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\InvoiceLine", mappedBy="invoice")
     */
    private $invoiceLines;

    /**
     * Invoice constructor.
     */
    public function __construct()
    {
        $this->invoiceLines = new ArrayCollection;
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
     * @return FiscalYear
     */
    public function getFiscalYear(): FiscalYear
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
     * @return InvoiceLine[]|ArrayCollection
     */
    public function getInvoiceLines()
    {
        return $this->invoiceLines;
    }

    /**
     * @param InvoiceLine[]|ArrayCollection $invoiceLines
     */
    public function setInvoiceLines($invoiceLines)
    {
        $this->invoiceLines = $invoiceLines;
    }

    /**
     * @param InvoiceLine $invoiceLine
     * @return $this
     */
    public function addInvoiceLine(InvoiceLine $invoiceLine)
    {
        $this->invoiceLines->add($invoiceLine);
        return $this;
    }

    /**
     * @param InvoiceLine $invoiceLine
     * @return bool
     */
    public function removeInvoiceLine(InvoiceLine $invoiceLine)
    {
        return $this->invoiceLines->removeElement($invoiceLine);
    }



}
