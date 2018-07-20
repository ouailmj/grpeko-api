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
 * Class VatSystem
 * @package AppBundle\Entity
 *
 *
 *
 * @ORM\Table(name="vat_system")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VatSystemRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class VatSystem
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
     * @var Company [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Company", mappedBy="vatSystem")
     */
    private $companies;

    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="vatSystem")
     */
    private $fiscalYears;

    /**
     * VatSystem constructor.
     */
    public function __construct()
    {
        $this->companies = new ArrayCollection();
        $this->fiscalYears = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return Company[]|ArrayCollection
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param Company[]|ArrayCollection $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
    }

    /**
     * @param Company $company
     * @return $this
     */
    public function addCompany(Company $company)
    {
        $this->companies->add($company);
        return $this;
    }

    /**
     * @param Company $company
     * @return bool
     */
    public function removeCompany(Company $company)
    {
        return $this->companies->removeElement($company);
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