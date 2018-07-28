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
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Customer
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Customer extends Company
{



    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $deathDate = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $faxNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $postalCode;

    /**
     * @var JobQuotation
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\JobQuotation", mappedBy="customer",cascade={"persist","remove"})
     */
    private $jobQuotations;

    /**
     * @var Calendar
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Calendar", inversedBy="customer")
     */
    private $calendar;

    /**
     * @var User
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User",cascade={"persist","remove"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var AccessCode [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AccessCode", mappedBy="customer",cascade={"persist","remove"})
     */
    private $accessCodes;

    /**
     * @var ContactStatus [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ContactStatus", mappedBy="customer",cascade={"persist","remove"})
     */
    private $contactsStatus;

    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="customer",cascade={"persist","remove"})
     */
    private $fiscalYears;

    /**
     * @var CustomerState
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerState", inversedBy="customers",cascade={"persist","remove"})
     */
    private $customerState;

    /**
     * @var CustomerStatus
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerStatus", inversedBy="customers",cascade={"persist","remove"})
     */
    private $customerStatus;

    /**
     * @var FormerAccountant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormerAccountant", inversedBy="customers",cascade={"persist","remove"}))
     */
    private $formerAccountant;

    /**
     * @var BankAccount [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BankAccount", mappedBy="customer",cascade={"persist","remove"})
     */
    private $bankAccounts;

    /**
     * @var Contact[] | ArrayCollection
     * @Assert\Valid
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Contact" ,mappedBy="customer" ,cascade={"persist", "remove"})
     */
    private $contacts;

    /**
     * @var Rendezvous
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Rendezvous", mappedBy="customer", cascade={"persist", "remove"})
     *
     */
    private $rendezvous;
    /**
     * Customer constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->accessCodes = new ArrayCollection();
        $this->contactsStatus = new ArrayCollection();
        $this->fiscalYears = new ArrayCollection();
        $this->bankAccounts = new ArrayCollection();
        $this->jobQuotations=new ArrayCollection();
        $this->contacts=new ArrayCollection();
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
     * @return Contact[]|ArrayCollection
     */
    public function getContacts()
    {
        return $this->contacts;
    }

    /**
     * @param Contact[]|ArrayCollection $contacts
     */
    public function setContacts($contacts)
    {
        $this->contacts = $contacts;
    }

    /**
     * @param $contacts
     *
     * @return $this
     */
    public function addContact(Contact $contacts)
    {
        $this->contacts->add($contacts);
        return $this;
    }
    /**
     * @param $contacts
     *
     * @return bool
     */
    public function removeContact($contacts)
    {
        return $this->contacts->removeElement($contacts);
    }

    /**
     * @return JobQuotation
     */
    public function getJobQuotations()
    {
        return $this->jobQuotations;
    }

    /**
     * @param JobQuotation $jobQuotations
     */
    public function setJobQuotations(JobQuotation $jobQuotations)
    {
        $this->jobQuotations = $jobQuotations;
    }


    /**
     * @param JobQuotation $jobQuotation
     * @return $this
     */
    public function addJobQuotation(JobQuotation $jobQuotation)
    {
        $this->accessCodes->add($jobQuotation);
        return $this;
    }

    /**
     * @param JobQuotation $jobQuotation
     * @return $this
     */
    public function removeJobQuotation(JobQuotation $jobQuotation)
    {
        $this->accessCodes->removeElement($jobQuotation);
        return $this;
    }


    /**
     * @return Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param Calendar $calendar
     */
    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * @return AccessCode[]|ArrayCollection
     */
    public function getAccessCodes()
    {
        return $this->accessCodes;
    }

    /**
     * @param AccessCode[]|ArrayCollection $accessCodes
     */
    public function setAccessCodes($accessCodes)
    {
        $this->accessCodes = $accessCodes;
    }

    /**
     * @param AccessCode $accessCode
     * @return $this
     */
    public function addAccessCode(AccessCode $accessCode)
    {
        $this->accessCodes->add($accessCode);
        return $this;
    }

    /**
     * @param AccessCode $accessCode
     * @return $this
     */
    public function removeAccessCode(AccessCode $accessCode)
    {
        $this->accessCodes->removeElement($accessCode);
        return $this;
    }

    /**
     * @return ContactStatus[]|ArrayCollection
     */
    public function getContactsStatus()
    {
        return $this->contactsStatus;
    }

    /**
     * @param ContactStatus[]|ArrayCollection $contactsStatus
     */
    public function setContactsStatus($contactsStatus)
    {
        $this->contactsStatus = $contactsStatus;
    }


    /**
     * @param ContactStatus $contactStatus
     * @return $this
     */
    public function addContactStatus(ContactStatus $contactStatus)
    {
        $this->contactsStatus->add($contactStatus);
        return $this;
    }

    /**
     * @param ContactStatus $contactStatus
     * @return $this
     */
    public function removeContactStatus(ContactStatus $contactStatus)
    {
        $this->contactsStatus->removeElement($contactStatus);
        return $this;
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

    /**
     * @return CustomerState
     */
    public function getCustomerState()
    {
        return $this->customerState;
    }

    /**
     * @param CustomerState $customerState
     */
    public function setCustomerState(CustomerState $customerState)
    {
        $this->customerState = $customerState;
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
     * @return BankAccount[]|ArrayCollection
     */
    public function getBankAccounts()
    {
        return $this->bankAccounts;
    }

    /**
     * @param BankAccount[]|ArrayCollection $bankAccounts
     */
    public function setBankAccounts($bankAccounts)
    {
        $this->bankAccounts = $bankAccounts;
    }

    /**
     * @param BankAccount $bankAccount
     * @return $this
     */
    public function addBankAccount(BankAccount $bankAccount)
    {
         $this->bankAccounts->add($bankAccount);
        return $this;
    }

    /**
     * @param BankAccount $bankAccount
     * @return bool
     */
    public function removeBankAccount(BankAccount $bankAccount)
    {
        return $this->bankAccounts->removeElement($bankAccount);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return \DateTime
     */
    public function getDeathDate()
    {
        return $this->deathDate;
    }

    /**
     * @param \DateTime $deathDate
     */
    public function setDeathDate(\DateTime $deathDate)
    {
        $this->deathDate = $deathDate;
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
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user)
    {
        $this->user = $user;
    }




}