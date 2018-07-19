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
 * Class CustomerStatus
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="customer_status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerStatusRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 *
 */
class CustomerStatus
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
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Customer", mappedBy="customerStatus")
     */
    private $customers;

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
     * @return $this
     */
    public function addCustomer(Customer $customer)
    {
        $this->customers->add($customer);
        return $this;
    }

    /**
     * @param Customer $customer
     * @return $this
     */
    public function removeCustomer(Customer $customer)
    {
        return $this->customers->removeElement($customer);
    }

}