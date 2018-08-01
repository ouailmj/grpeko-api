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
 * Class CustomerState.
 *
 *
 *
 * @ORM\Table(name="customer_state")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerStateRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class CustomerState
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
     * @var Customer [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Customer", mappedBy="customerState")
     */
    private $customers;

    public function __construct()
    {
        $this->customers = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Customer[]|ArrayCollection
     */
    public function getCustomers()
    {
        return $this->customers;
    }

    /**
     * @param Customer[]|ArrayCollection $customers
     */
    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }

    /**
     * @param Customer $customer
     *
     * @return $this
     */
    public function addCustomer(Customer $customer)
    {
        $this->customers->add($customer);

        return $this;
    }

    /**
     * @param Customer $customer
     *
     * @return $this
     */
    public function removeCustomer(Customer $customer)
    {
        return $this->customers->removeElement($customer);
    }
}
