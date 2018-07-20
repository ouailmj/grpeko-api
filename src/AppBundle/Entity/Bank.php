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
 * Class Bank
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="bank")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BankRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Bank
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
     * @var BankAccount [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\BankAccount", mappedBy="bank")
     */
    private $bankAccounts;

    /**
     * Bank constructor.
     */
    public function __construct()
    {
        $this->bankAccounts = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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