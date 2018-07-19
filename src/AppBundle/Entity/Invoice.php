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
 * Class Invoice
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Invoice
{
    /**
     * @var Address
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @var Own [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Own", mappedBy="invoice")
     */
    private $owns;

    /**
     * @var Payment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Payment", mappedBy="invoice")
     */
    private $payments;

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
        $this->owns = new ArrayCollection();
        $this->payments = new ArrayCollection();
        $this->invoiceLines = new ArrayCollection();
    }


    /**
     * @return Own[]|ArrayCollection
     */
    public function getOwns()
    {
        return $this->owns;
    }

    /**
     * @param Own[]|ArrayCollection $owns
     */
    public function setOwns($owns)
    {
        $this->owns = $owns;
    }

    /**
     * @param Own $own
     * @return $this
     */
    public function addOwn(Own $own)
    {
        $this->owns->add($own);
        return $this;
    }

    /**
     * @param Own $own
     * @return bool
     */
    public function removeOwn(Own $own)
    {
       return $this->owns->removeElement($own);
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

    /**
     * @return Payment[]|ArrayCollection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param Payment[]|ArrayCollection $payments
     */
    public function setPayments($payments)
    {
        $this->payments = $payments;
    }


    /**
     * @param Payment $payment
     * @return $this
     */
    public function addPayment(Payment $payment)
    {
        $this->payments->add($payment);
        return $this;
    }

    /**
     * @param Payment $payment
     * @return bool
     */
    public function removePayment(Payment $payment)
    {
        return $this->payments->removeElement($payment);
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }



}