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
 * Class PaymentMode.
 *
 *
 * @ORM\Table(name="payment_mode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PaymentModeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class PaymentMode
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
     * @var Payment [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Payment", mappedBy="paymentMode")
     */
    private $payments;

    /**
     * PaymentMode constructor.
     */
    public function __construct()
    {
        $this->payments = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Payment[]|ArrayCollection
     */
    public function getPayments()
    {
        return $this->payments;
    }

    /**
     * @param Payment[]|ArrayCollection $payment
     */
    public function setPayments($payment)
    {
        $this->payments = $payment;
    }

    /**
     * @param Payment $payment
     *
     * @return $this
     */
    public function addOwn(Payment $payment)
    {
        $this->payments->add($payment);

        return $this;
    }

    /**
     * @param Payment $payment
     *
     * @return bool
     */
    public function removeOwn(Payment $payment)
    {
        return $this->payments->removeElement($payment);
    }
}
