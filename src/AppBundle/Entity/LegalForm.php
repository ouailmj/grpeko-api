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
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="legalForm")
     */
    private $fiscalYears;

    /**
     * @var Company [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Company", mappedBy="legalForm")
     */
    private $companies;


    /**
     * LegalForm constructor.
     */
    public function __construct()
    {
        $this->companies = new ArrayCollection();
        $this->fiscalYears = new  ArrayCollection();
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