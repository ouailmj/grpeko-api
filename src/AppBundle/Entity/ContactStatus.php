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
 * Class ContactStatus
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="contact_status")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactStatusRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class ContactStatus
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
     * @var Contact
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Contact", mappedBy="contactStatus")
     */
    private $contact;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="Customer", inversedBy="contactsStatus")
     */
    private $customer;
    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=255)
     */
    private $status;
    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param string $status
     */
    public function setStatus(string $status)
    {
        $this->status = $status;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
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


}