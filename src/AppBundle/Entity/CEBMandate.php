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
 * Class CEBMandate.
 *
 *
 *
 * @ORM\Table(name="ceb_mandate")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CEBMandateRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class CEBMandate
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
     * @var BankAccount
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\BankAccount", mappedBy="cebMandate")
     */
    private $bankAccount;

    /**
     * @var CEBProvider
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CEBProvider", inversedBy="cebMandates")
     */
    private $cebProvider;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return BankAccount
     */
    public function getBankAccount()
    {
        return $this->bankAccount;
    }

    /**
     * @param BankAccount $bankAccount
     */
    public function setBankAccount(BankAccount $bankAccount)
    {
        $this->bankAccount = $bankAccount;
    }

    /**
     * @return CEBProvider
     */
    public function getCebProvider()
    {
        return $this->cebProvider;
    }

    /**
     * @param CEBProvider $cebProvider
     */
    public function setCebProvider(CEBProvider $cebProvider)
    {
        $this->cebProvider = $cebProvider;
    }
}
