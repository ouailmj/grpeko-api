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
 * Class FiscalYear
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="fiscal_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FiscalYearRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class FiscalYear
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetimetz",nullable=true)
     */
    protected $startDate;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetimetz",nullable=true)
     */
    protected $closeDate;
    /**
     * @var string
     *
     * @ORM\OneToOne(targetEntity="Mode")
     * @ORM\JoinColumn(name="mode_id", referencedColumnName="id")
     */
    private $mode;

    protected $status;
    /**
     * @var LegalForm
     * @ORM\ManyToOne(targetEntity="LegalForm", inversedBy="fiscalYears")
     *
     */
    private $legalForm;

    protected $year;
    /**
     * @var TaxSystem
     * @ORM\ManyToOne(targetEntity="TaxSystem", inversedBy="fiscalYears")
     *
     */
    private $taxSystem;

    protected $taxationRegime;
    /**
     * @var VatSystem
     * @ORM\ManyToOne(targetEntity="VatSystem", inversedBy="fiscalYears")
     *
     */
    private $vatSystem;

    /**
     * @var Address
     *
     * @ORM\ManyToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="address_id", referencedColumnName="id")
     */
    private $address;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="fiscalYears")
     *
     */
    private $customer;

    /**
     * @var Assignment
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Assignment", inversedBy="mainFiscalYear")
     *
     */
    private $mainAssignment;

    /**
     * @var Assignment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Assignment", mappedBy="secondaryFiscalYear")
     *
     */
    private $secondaryAssignments;

    /**
     * FiscalYear constructor.
     */
    public function __construct()
    {
        $this->secondaryAssignments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param Mode $mode
     */
    public function setMode(Mode $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return LegalForm
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * @param LegalForm $legalForm
     */
    public function setLegalForm(LegalForm $legalForm)
    {
        $this->legalForm = $legalForm;
    }

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     */
    public function setAddress(Address $address)
    {
        $this->address = $address;
    }

    /**
     * @return TaxSystem
     */
    public function getTaxSystem()
    {
        return $this->taxSystem;
    }

    /**
     * @param TaxSystem $taxSystem
     */
    public function setTaxSystem(TaxSystem $taxSystem)
    {
        $this->taxSystem = $taxSystem;
    }

    /**
     * @return VatSystem
     */
    public function getVatSystem()
    {
        return $this->vatSystem;
    }

    /**
     * @param VatSystem $vatSystem
     */
    public function setVatSystem(VatSystem $vatSystem)
    {
        $this->vatSystem = $vatSystem;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return Assignment
     */
    public function getMainAssignment()
    {
        return $this->mainAssignment;
    }

    /**
     * @param Assignment $mainAssignment
     */
    public function setMainAssignment(Assignment $mainAssignment)
    {
        $this->mainAssignment = $mainAssignment;
    }

    /**
     * @return Assignment[]|ArrayCollection
     */
    public function getSecondaryAssignments()
    {
        return $this->secondaryAssignments;
    }

    /**
     * @param Assignment[]|ArrayCollection $secondaryAssignments
     */
    public function setSecondaryAssignments($secondaryAssignments)
    {
        $this->secondaryAssignments = $secondaryAssignments;
    }

    /**
     * @param Assignment $secondaryAssignment
     * @return $this
     */
    public function addSecondaryAssignment(Assignment $secondaryAssignment)
    {
        $this->secondaryAssignments->add($secondaryAssignment);
        return $this;
    }

    /**
     * @param Assignment $secondaryAssignment
     * @return bool
     */
    public function removeSecondaryAssignment(Assignment $secondaryAssignment)
    {
        return $this->secondaryAssignments->removeElement($secondaryAssignment);
    }





}