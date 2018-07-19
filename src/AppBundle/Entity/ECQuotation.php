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
     * @var QuotationLine [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\QuotationLine", mappedBy="ecQuotation")
     */
    private $quotationLines;

    /**
     * ECQuotation constructor.
     */
    public function __construct()
    {
        $this->quotationLines = new ArrayCollection();
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