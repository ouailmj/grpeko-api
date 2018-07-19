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
 * Class InvoiceLine
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="invoice_line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceLineRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class InvoiceLine
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
     * @var Invoice
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="invoiceLines")
     */
    private $invoice;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }


}