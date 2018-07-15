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
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Product.
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 *
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 *
 * @ORM\DiscriminatorMap({
 *     "product"="Product",
 *     "mission"="Mission",
 * })
 * @ApiResource
 * @ORM\HasLifecycleCallbacks()
 */
class Product
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
     *  @Groups({"type_mission"})
     */
    private $price;

    /**
     * @var  ArrayCollection
     * @ORM\OneToMany(targetEntity="QuotationLine", mappedBy="product")
     */
    private $quotationLines;

    /**
     * Product constructor.
     */
    public function __construct()
    {
        $this->quotationLines = new ArrayCollection();
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
     * @return Product
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
     * @return ArrayCollection
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
