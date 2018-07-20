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
 * Class Company
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "company"="Company",
 *     "customer"="Customer",
 *     })
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Company
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
     * @var APECode
     * @ORM\ManyToOne(targetEntity="APECode", inversedBy="companies")
     */
    private $apeCode;

    /**
     * @var LegalForm
     * @ORM\ManyToOne(targetEntity="LegalForm", inversedBy="companies")
     */
    private $legalForm;

    /**
     * @var TaxSystem
     * @ORM\ManyToOne(targetEntity="TaxSystem", inversedBy="companies")
     */
    private $taxSystem;

    /**
     * @var VatSystem
     * @ORM\ManyToOne(targetEntity="VatSystem", inversedBy="companies")
     */
    private $vatSystem;

    /**
     * @var Address [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="Address")
     * @ORM\JoinTable(name="company_address",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id", unique=true)}
     *      )
     */
    private $oldAddresses;

    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="Address")
     * @ORM\JoinColumn(name="current_address_id", referencedColumnName="id")
     */
    private $currentAddress;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legalName;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $faxNumber;
    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    private $otherPhoneNumbers = [];
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $postalCode;
    /**
     * Regime d'imposition.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taxationRegime;

    /**
     * Activite principale.
     *
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $mainActivity;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $socialReason;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $code;
    /**
     * @var CustomerStatus
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CustomerStatus" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    private $customerStatus;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $relation;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $siretNumber;
    /**
     * TVA intra communautaire.
     *
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $intraCommunityVAT;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $sirenNumber;
    /**
     * Nombre d'actions ou parts sociales.
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $nbActions;
    /**
     * capital social.
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    private $capitalSocial;
    /**
     * Company constructor.
     */
    public function __construct()
    {
        $this->oldAddresses = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return APECode
     */
    public function getApeCode()
    {
        return $this->apeCode;
    }

    /**
     * @param APECode $apeCode
     */
    public function setApeCode(APECode $apeCode)
    {
        $this->apeCode = $apeCode;
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
     * @return Address[]|ArrayCollection
     */
    public function getOldAddresses()
    {
        return $this->oldAddresses;
    }

    /**
     * @param Address[]|ArrayCollection $oldAddresses
     */
    public function setOldAddresses($oldAddresses)
    {
        $this->oldAddresses = $oldAddresses;
    }

    /**
     * @param Address $oldAddress
     * @return $this
     */
    public function addOldAddress(Address $oldAddress)
    {
        $this->oldAddresses->add($oldAddress);
        return $this;
    }

    /**
     * @param Address $oldAddress
     * @return bool
     */
    public function removeOldAddress(Address $oldAddress)
    {
        return $this->oldAddresses->removeElement($oldAddress);
    }

    /**
     * @return Address
     */
    public function getCurrentAddress()
    {
        return $this->currentAddress;
    }

    /**
     * @param Address $currentAddress
     */
    public function setCurrentAddress(Address $currentAddress)
    {
        $this->currentAddress = $currentAddress;
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



}