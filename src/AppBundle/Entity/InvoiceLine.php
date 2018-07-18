<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * InvoiceLine
 *
 * @ORM\Table(name="invoice_line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceLineRepository")
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
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     */
    private $price;

    /**
     * @var TypeMission [] | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="TypeMission")
     * @ORM\JoinTable(name="type_mission_invoice_line",
     *      joinColumns={@ORM\JoinColumn(name="invoice_line_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="type_mission_id", referencedColumnName="id")}
     *      )
     */
    private $typeMissions;

    /**
     * @var Invoice
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="invoiceLines")
     */
    private $invoice;

    /**
     * InvoiceLine constructor.
     */
    public function __construct()
    {
        $this->typeMissions = new ArrayCollection();
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
     * Set price.
     *
     * @param float $price
     *
     * @return InvoiceLine
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price.
     *
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return Invoice
     */
    public function getInvoice(): Invoice
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

    /**
     * @return TypeMission[]|ArrayCollection
     */
    public function getTypeMissions()
    {
        return $this->typeMissions;
    }

    /**
     * @param TypeMission[]|ArrayCollection $typeMissions
     */
    public function setTypeMissions($typeMissions)
    {
        $this->typeMissions = $typeMissions;
    }

    /**
     * @param TypeMission $typeMission
     * @return $this
     */
    public function addTypeMission(TypeMission $typeMission)
    {
        $this->typeMissions->add($typeMission);
        return $this;
    }

    /**
     * @param TypeMission $typeMission
     * @return bool
     */
    public function removeTypeMission(TypeMission $typeMission)
    {
        return $this->typeMissions->removeElement($typeMission);
    }






}
