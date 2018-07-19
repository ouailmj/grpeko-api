<?php
/**
 * Created by PhpStorm.
 * User: soufiane
 * Date: 18/07/18
 * Time: 12:43
 */

namespace AppBundle\Entity;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class PaymentMode
 * @package AppBundle\Entity
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
     * @return Payment[]|ArrayCollection
     */
    public function getPayment()
    {
        return $this->payments;
    }

    /**
     * @param Payment[]|ArrayCollection $payment
     */
    public function setPayment($payment)
    {
        $this->payments = $payment;
    }


    /**
     * @param Payment $payment
     * @return $this
     */
    public function addOwn(Payment $payment)
    {
        $this->payments->add($payment);
        return $this;
    }

    /**
     * @param Payment $payment
     * @return bool
     */
    public function removeOwn(Payment $payment)
    {
        return $this->payments->removeElement($payment);
    }

}