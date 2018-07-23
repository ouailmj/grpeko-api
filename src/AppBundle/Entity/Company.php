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
    private $faxNumber;

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
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $legalEntity;
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
     * @return string
     */
    public function getLegalEntity()
    {
        return $this->legalEntity;
    }

    /**
     * @param string $legalEntity
     */
    public function setLegalEntity(string $legalEntity)
    {
        $this->legalEntity = $legalEntity;
    }



}