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
 * QuotationLine.
 *
 * @ORM\Table(name="quotation_line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuotationLineRepository")
 */
class QuotationLine
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
     * @var Product
     * @ORM\ManyToOne(targetEntity="Product", inversedBy="quotationLines")
     */
    private $product;

    /**
     * @var Quotation
     * @ORM\ManyToOne(targetEntity="Quotation", inversedBy="quotationLines")
     */
    private $quotation;

    /**
     * @var Company
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company",inversedBy="quotationLines")
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
     * @return Product
     */
    public function getProduct(): Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @return Quotation
     */
    public function getQuotation(): Quotation
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
     * @return Company
     */
    public function getCompany(): Company
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
