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
 * Class ECQuotation
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ECQuotationRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class ECQuotation extends JobQuotation
{

    /**
     * ECQuotation constructor.
     */
    public function __construct()
    {
        $this->quotationLines = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @var QuotationLine [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuotationLine", mappedBy="ecQuotation")
     */
    private $quotationLines;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getNbPurchaseInvoicPerYear(): string
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
    public function getNbSalesInvoicesPerYear(): string
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

    /**
     * @param QuotationLine $quotationLine
     * @return $this
     */
    public function addQuotationLine(QuotationLine $quotationLine)
    {
        $this->quotationLines->add($quotationLine);
        return $this;
    }

    /**
     * @param QuotationLine $quotationLine
     * @return bool
     */
    public function removeQuotationLine(QuotationLine $quotationLine)
    {
        return $this->quotationLines->removeElement($quotationLine);
    }


}