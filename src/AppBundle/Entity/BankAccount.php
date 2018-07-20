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
 * Class BankAccount
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="bank_account")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BankAccountRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 *
 */
class BankAccount
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
     * @var Customer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customer", inversedBy="bankAccounts")
     */
    private $customer;

    /**
     * @var Bank
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Bank", inversedBy="bankAccounts")
     */
    private $bank;

    /**
     * @var Journal
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Journal", inversedBy="bankAccounts")
     */
    private $journal;

    /**
     * @var SentToCustomerStatus
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\SentToCustomerStatus", inversedBy="bankAccounts")
     */
    private $sentToCustomerStatus;

    /**
     * @var CEBMandate
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\CEBMandate", inversedBy="bankAccount")
     */
    private $cebMandate;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return Bank
     */
    public function getBank()
    {
        return $this->bank;
    }

    /**
     * @param Bank $bank
     */
    public function setBank(Bank $bank)
    {
        $this->bank = $bank;
    }

    /**
     * @return Journal
     */
    public function getJournal()
    {
        return $this->journal;
    }

    /**
     * @param Journal $journal
     */
    public function setJournal(Journal $journal)
    {
        $this->journal = $journal;
    }

    /**
     * @return SentToCustomerStatus
     */
    public function getSentToCustomerStatus()
    {
        return $this->sentToCustomerStatus;
    }

    /**
     * @param SentToCustomerStatus $sentToCustomerStatus
     */
    public function setSentToCustomerStatus(SentToCustomerStatus $sentToCustomerStatus)
    {
        $this->sentToCustomerStatus = $sentToCustomerStatus;
    }

    /**
     * @return CEBMandate
     */
    public function getCebMandate()
    {
        return $this->cebMandate;
    }

    /**
     * @param CEBMandate $cebMandate
     */
    public function setCebMandate(CEBMandate $cebMandate)
    {
        $this->cebMandate = $cebMandate;
    }




}