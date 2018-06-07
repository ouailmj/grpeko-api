<?php

/*
 * This file is part of the Napier project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Entity;

use AppBundle\Model\LegalEntity;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Company.
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 */
class Company extends LegalEntity
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
     * Regime Fiscal
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $taxSystem;

    /**
     * Forme juridique.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $legalForm;

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
     *
     */
    protected $socialReason;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $code;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $status;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $relation;

    /**
     * @var integer
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     *
     */
    protected $apeCode;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    protected $siretNumber;

    /**
     * TVA intra communautaire
     *
     * @var string
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    protected $intraCommunityVAT;

    /**
     * @var string
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    protected $sirenNumber;

    /**
     * Nombre d'actions ou parts sociales
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    protected $nbActions;

    /**
     * capital social
     *
     * @var integer
     *
     * @ORM\Column(type="integer", nullable=true)
     *
     */
    protected $capitalSocial;


    /**
     * @var Address
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address")
     *
     * @ORM\JoinColumn(name="current_address_id", referencedColumnName="id")
     */
    protected $currentAddress;

    /**
     * @var Address[] | ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Address")
     *
     * @ORM\JoinTable(name="company_address",
     *      joinColumns={@ORM\JoinColumn(name="company_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="address_id", referencedColumnName="id")}
     *      )
     */
    protected $oldAddresses;

    /**
     * @var Contact[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Contact" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $contacts;

    /**
     * @var FiscalYear[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $fiscalYears;

    /**
     * @var Mission[] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mission" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $missions;

    /**
     * @var Customer
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Customer" ,mappedBy="company" ,cascade={"persist", "remove"}))
     */
    protected $customerAccount;

    /**
     * Ancien Expert-comptable
     *
     * @var FormerAccountant
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\FormerAccountant", mappedBy="company")
     *
     */
    protected $formerAccountant;


    /**
     * @var EnterRelation
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\EnterRelation" ,mappedBy="company" ,cascade={"persist"})
     */
    private $enterRelation;

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
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * @param string $legalForm
     */
    public function setLegalForm(string $legalForm)
    {
        $this->legalForm = $legalForm;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
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
     * @return int
     */
    public function getApeCode()
    {
        return $this->apeCode;
    }

    /**
     * @param int $apeCode
     */
    public function setApeCode(int $apeCode)
    {
        $this->apeCode = $apeCode;
    }

    /**
     * @return int
     */
    public function getSiretNumber()
    {
        return $this->siretNumber;
    }

    /**
     * @param int $siretNumber
     */
    public function setSiretNumber(int $siretNumber)
    {
        $this->siretNumber = $siretNumber;
    }

    /**
     * @return string
     */
    public function getIntraCommunityVAT()
    {
        return $this->intraCommunityVAT;
    }

    /**
     * @param string $intraCommunityVAT
     */
    public function setIntraCommunityVAT(string $intraCommunityVAT)
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
     * @return Address[]|ArrayCollection
     */
    public function getOldAddresses()
    {
        return $this->oldAddresses;
    }

    /**
     * @param $oldAddresses
     * @return $this
     */
    public function addOldAddresses($oldAddresses)
    {
        $this->oldAddresses->add($oldAddresses);
        return $this;
    }

    /**
     * @param $oldAddresses
     * @return bool
     */
    public function removeOldAddresses($oldAddresses)
    {
        return $this->oldAddresses->removeElement($oldAddresses);

    }

    /**
     * @return Contact[]|ArrayCollection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param $contacts
     * @return $this
     */
    public function addContacts($contacts)
    {
        $this->contacts->add($contacts);
        return $this;
    }

    /**
     * @param $contacts
     * @return bool
     */
    public function removeContacts($contacts)
    {
        return $this->contacts->removeElement($contacts);

    }

    /**
     * @return FiscalYear[]|ArrayCollection
     */
    public function getFiscalYears()
    {
        return $this->fiscalYears;
    }

    /**
     * @param $fiscalYears
     * @return $this
     */
    public function addFiscalYears($fiscalYears)
    {
        $this->fiscalYears->add($fiscalYears);
        return $this;
    }

    /**
     * @param $fiscalYears
     * @return bool
     */
    public function removeFiscalYears($fiscalYears)
    {
        return $this->fiscalYears->removeElement($fiscalYears);

    }

    /**
     * @return Mission[]|ArrayCollection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param $missions
     * @return $this
     */
    public function addMission($missions)
    {
        $this->missions->add($missions) ;
        return $this;
    }

    /**
     * @param $missions
     * @return bool
     */
    public function removeMission($missions)
    {
       return $this->missions->removeElement($missions);

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
     * @return EnterRelation
     */
    public function getEnterRelation()
    {
        return $this->enterRelation;
    }

    /**
     * @param EnterRelation $enterRelation
     */
    public function setEnterRelation(EnterRelation $enterRelation)
    {
        $this->enterRelation = $enterRelation;
    }



}
