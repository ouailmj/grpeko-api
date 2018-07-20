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
     * @var JobQuotation
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\JobQuotation", mappedBy="customer")
     */
    private $jobQuotations;

    /**
     * @var Calendar
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Calendar", inversedBy="customer")
     */
    private $calendar;

    /**
     * @var AccessCode [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AccessCode", mappedBy="customer")
     */
    private $accessCodes;

    /**
     * @var ContactStatus [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\ContactStatus", mappedBy="customer")
     */
    private $contactsStatus;

    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="customer")
     */
    private $fiscalYears;

    /**
     * @var CustomerState
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerState", inversedBy="customers")
     */
    private $customerState;

    /**
     * @var CustomerStatus
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerStatus", inversedBy="customers")
     */
    private $customerStatus;

    /**
     * @var FormerAccountant
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\FormerAccountant", inversedBy="customers")
     */
    private $formerAccountant;

    /**
     * @var BankAccount [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BankAccount", mappedBy="customer")
     */
    private $bankAccounts;

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




}