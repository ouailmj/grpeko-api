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
 * Class FormerAccountant.
 *
 * @ORM\Table(name="former_accountant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormerAccountantRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class FormerAccountant
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255,nullable=true)
     */
    private $name;
    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=255,nullable=true)
     */
    private $civility;
    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=255,nullable=true)
     */
    private $firstName;
    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=255,nullable=true)
     */
    private $lastName;

    /**
     * @var Customer [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Customer", mappedBy="formerAccountant")
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
    public function getCivility()
    {
        return $this->civility;
    }

    /**
     * @param string $civility
     */
    public function setCivility(string $civility)
    {
        $this->civility = $civility;
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
