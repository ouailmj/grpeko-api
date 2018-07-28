<?php

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
     * @ORM\ManyToOne(targetEntity="Invoice", inversedBy="invoiceLines")
     */
    private $invoice;
    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }
    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
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