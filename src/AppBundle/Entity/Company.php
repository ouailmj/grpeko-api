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
     * Company constructor.
     */
    public function __construct()
    {
        $this->oldAddresses = new ArrayCollection();
        $this->fiscalYears = new ArrayCollection();
        $this->contacts = new ArrayCollection();
        $this->otherPhoneNumbers = new ArrayCollection();
        $this->quotations = new ArrayCollection();
        $this->quotationLines = new ArrayCollection();
        $this->invoices = new ArrayCollection();
    }

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var APECode
     * @ORM\ManyToOne(targetEntity="APECode")
     * @ORM\JoinColumn(name="ape_code_id", referencedColumnName="id")
     */
    private $apeCode;
    /**
     * @var LegalForm
     * @ORM\ManyToOne(targetEntity="LegalForm")
     * @ORM\JoinColumn(name="legal_form_id", referencedColumnName="id")
     */
    private $legalForm;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $legalName;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $faxNumber;
    /**
     * @var array
     *
     * @ORM\Column(type="array", nullable=true)
     */
    protected $otherPhoneNumbers = [];
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $postalCode;
    /**
     * Regime d'imposition.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $taxationRegime;
    /**
     * Regime TVA.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $vatSystem;
    /**
     * Regime Fiscal.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $taxSystem;
    /**
     * Activite principale.
     *
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    protected $mainActivity;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $socialReason;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $code;
    /**
     * @var CustomerStatus
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CustomerStatus" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $customerStatus;
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $relation;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $siretNumber;
    /**
     * TVA intra communautaire.
     *
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    protected $intraCommunityVAT;
    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    protected $sirenNumber;
    /**
     * Nombre d'actions ou parts sociales.
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $nbActions;
    /**
     * capital social.
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     */
    protected $capitalSocial;
    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address", cascade={"persist", "remove"})
     *
     * @ORM\JoinColumn(name="current_address_id", referencedColumnName="id")
     */
    protected $currentAddress;
    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address", cascade={"persist", "remove"})
     *
     * @ORM\JoinColumn(name="siege_address_id", referencedColumnName="id")
     */
    protected $siegeAddress;
    /**
     * @var Address[] | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Address", cascade={"persist", "remove"})
     *
     * @ORM\JoinTable(name="company_address",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
     *      )
     */
    protected $oldAddresses;
    /**
     * @var Contact[] | ArrayCollection
     * @Assert\Valid
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Contact" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $contacts;
    /**
     * @var FiscalYear[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear" ,mappedBy="company" ,cascade={"persist", "remove"})
     */
    protected $fiscalYears;
    /**
     * @var Customer
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Customer" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $customerAccount;
    /**
     * Ancien Expert-comptable.
     *
     * @var FormerAccountant
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FormerAccountant", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="former_accountant_id", referencedColumnName="id")
     */
    protected $formerAccountant;
    /**
     * @var Rendezvous
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Rendezvous", mappedBy="company", cascade={"persist", "remove"})
     *
     */
    private $rendezvous;
    /**
     * @var Quotation [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Quotation", mappedBy="company")
     */
    private $quotations;
    /**
     * @var QuotationLine [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="QuotationLine",  mappedBy="company")
     */
    private $quotationLines;
    /**
     * @var Invoice [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Invoice", mappedBy="company")
     */
    private $invoices;

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
     * @return int
     */
    public function getId()
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
    public function getLegalName()
    {
        return $this->legalName;
    }

    /**
     * @param string $legalName
     */
    public function setLegalName(string $legalName)
    {
        $this->legalName = $legalName;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $faxNumber
     */
    public function setFaxNumber(string $faxNumber)
    {
        $this->faxNumber = $faxNumber;
    }

    /**
     * @return array
     */
    public function getOtherPhoneNumbers()
    {
        return $this->otherPhoneNumbers;
    }

    /**
     * @param array $otherPhoneNumbers
     */
    public function setOtherPhoneNumbers(array $otherPhoneNumbers)
    {
        $this->otherPhoneNumbers = $otherPhoneNumbers;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getTaxationRegime()
    {
        return $this->taxationRegime;
    }

    /**
     * @param string $taxationRegime
     */
    public function setTaxationRegime(string $taxationRegime)
    {
        $this->taxationRegime = $taxationRegime;
    }

    /**
     * @return string
     */
    public function getVatSystem()
    {
        return $this->vatSystem;
    }

    /**
     * @param string $vatSystem
     */
    public function setVatSystem(string $vatSystem)
    {
        $this->vatSystem = $vatSystem;
    }

    /**
     * @return string
     */
    public function getTaxSystem()
    {
        return $this->taxSystem;
    }

    /**
     * @param string $taxSystem
     */
    public function setTaxSystem(string $taxSystem)
    {
        $this->taxSystem = $taxSystem;
    }

    /**
     * @return string
     */
    public function getMainActivity()
    {
        return $this->mainActivity;
    }

    /**
     * @param string $mainActivity
     */
    public function setMainActivity(string $mainActivity)
    {
        $this->mainActivity = $mainActivity;
    }

    /**
     * @return string
     */
    public function getSocialReason()
    {
        return $this->socialReason;
    }

    /**
     * @param string $socialReason
     */
    public function setSocialReason(string $socialReason)
    {
        $this->socialReason = $socialReason;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode(string $code)
    {
        $this->code = $code;
    }

    /**
     * @return CustomerStatus
     */
    public function getCustomerStatus()
    {
        return $this->customerStatus;
    }

    /**
     * @param CustomerStatus $customerStatus
     */
    public function setCustomerStatus(CustomerStatus $customerStatus)
    {
        $this->customerStatus = $customerStatus;
    }

    /**
     * @return string
     */
    public function getRelation()
    {
        return $this->relation;
    }

    /**
     * @param string $relation
     */
    public function setRelation(string $relation)
    {
        $this->relation = $relation;
    }

    /**
     * @return string
     */
    public function getSiretNumber()
    {
        return $this->siretNumber;
    }

    /**
     * @param string $siretNumber
     */
    public function setSiretNumber(string $siretNumber)
    {
        $this->siretNumber = $siretNumber;
    }

    /**
     * @return float
     */
    public function getIntraCommunityVAT()
    {
        return $this->intraCommunityVAT;
    }

    /**
     * @param float $intraCommunityVAT
     */
    public function setIntraCommunityVAT(float $intraCommunityVAT)
    {
        $this->intraCommunityVAT = $intraCommunityVAT;
    }

    /**
     * @return string
     */
    public function getSirenNumber()
    {
        return $this->sirenNumber;
    }

    /**
     * @param string $sirenNumber
     */
    public function setSirenNumber(string $sirenNumber)
    {
        $this->sirenNumber = $sirenNumber;
    }

    /**
     * @return int
     */
    public function getNbActions()
    {
        return $this->nbActions;
    }

    /**
     * @param int $nbActions
     */
    public function setNbActions(int $nbActions)
    {
        $this->nbActions = $nbActions;
    }

    /**
     * @return int
     */
    public function getCapitalSocial()
    {
        return $this->capitalSocial;
    }

    /**
     * @param int $capitalSocial
     */
    public function setCapitalSocial(int $capitalSocial)
    {
        $this->capitalSocial = $capitalSocial;
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
     * @return Address
     */
    public function getSiegeAddress()
    {
        return $this->siegeAddress;
    }

    /**
     * @param Address $siegeAddress
     */
    public function setSiegeAddress(Address $siegeAddress)
    {
        $this->siegeAddress = $siegeAddress;
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
     * @return ArrayCollection|Contact[]
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param ArrayCollection|Contact[] $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @return ArrayCollection|FiscalYear[]
     */
    public function getFiscalYears()
    {
        return $this->fiscalYears;
    }

    /**
     * @param ArrayCollection|FiscalYear[] $fiscalYears
     */
    public function setFiscalYears($fiscalYears)
    {
        $this->fiscalYears = $fiscalYears;
    }

    /**
     * @return Customer
     */
    public function getCustomerAccount()
    {
        return $this->customerAccount;
    }

    /**
     * @param Customer $customerAccount
     */
    public function setCustomerAccount(Customer $customerAccount)
    {
        $this->customerAccount = $customerAccount;
    }

    /**
     * @return FormerAccountant
     */
    public function getFormerAccountant()
    {
        return $this->formerAccountant;
    }

    /**
     * @param FormerAccountant $formerAccountant
     */
    public function setFormerAccountant(FormerAccountant $formerAccountant)
    {
        $this->formerAccountant = $formerAccountant;
    }

    /**
     * @return Rendezvous
     */
    public function getRendezvous()
    {
        return $this->rendezvous;
    }

    /**
     * @param Rendezvous $rendezvous
     */
    public function setRendezvous(Rendezvous $rendezvous)
    {
        $this->rendezvous = $rendezvous;
    }

    /**
     * @return ArrayCollection|Quotation[]
     */
    public function getQuotations()
    {
        return $this->quotations;
    }

    /**
     * @param ArrayCollection|Quotation[] $quotations
     */
    public function setQuotations($quotations)
    {
        $this->quotations = $quotations;
    }

    /**
     * @return ArrayCollection|QuotationLine[]
     */
    public function getQuotationLines()
    {
        return $this->quotationLines;
    }

    /**
     * @param ArrayCollection|QuotationLine[] $quotationLines
     */
    public function setQuotationLines($quotationLines)
    {
        $this->quotationLines = $quotationLines;
    }

    /**
     * @return ArrayCollection|Invoice[]
     */
    public function getInvoices()
    {
        return $this->invoices;
    }

    /**
     * @param ArrayCollection|Invoice[] $invoices
     */
    public function setInvoices($invoices)
    {
        $this->invoices = $invoices;
    }

}