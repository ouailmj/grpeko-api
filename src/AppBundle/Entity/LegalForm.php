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
 * Class LegalForm
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="legal_form")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LegalFormRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class LegalForm
{

    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="legalForm")
     */
    private $fiscalYears;

    /**
     * LegalForm constructor.
     */
    public function __construct()
    {
        $this->fiscalYears = new  ArrayCollection();
    }

    /**
     * @return FiscalYear[]|ArrayCollection
     */
    public function getFiscalYears()
    {
        return $this->fiscalYears;
    }

    /**
     * @param FiscalYear[]|ArrayCollection $fiscalYears
     */
    public function setFiscalYears($fiscalYears)
    {
        $this->fiscalYears = $fiscalYears;
    }

    /**
     * @param FiscalYear $fiscalYear
     * @return $this
     */
    public function addFiscalYear(FiscalYear $fiscalYear)
    {
        $this->fiscalYears->add($fiscalYear);
        return $this;
    }

    /**
     * @param FiscalYear $fiscalYear
     * @return bool
     */
    public function removeFiscalYear(FiscalYear $fiscalYear)
    {
        return $this->fiscalYears->removeElement($fiscalYear);
    }



}