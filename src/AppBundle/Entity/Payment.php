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
 * Class Payment
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Payment
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
     * @var Invoice
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="payments")
     */
    private $invoice;

    /**
     * @var PaymentMode
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\PaymentMode", inversedBy="payments")
     */
    private $paymentMode;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoice $invoice
     */
    public function setInvoice(Invoice $invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * @return PaymentMode
     */
    public function getPaymentMode()
    {
        return $this->paymentMode;
    }

    /**
     * @param PaymentMode $paymentMode
     */
    public function setPaymentMode(PaymentMode $paymentMode)
    {
        $this->paymentMode = $paymentMode;
    }

}