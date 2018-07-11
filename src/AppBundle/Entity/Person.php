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

use AppBundle\Model\Person as BasePerson;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PersonRepository")
 * @ORM\Table(name="person")
 *
 *
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 *
 * @ORM\DiscriminatorMap({
 *     "person"="Person",
 *     "employee"="Employee",
 *     "customer"="Customer"
 * })
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Person extends BasePerson
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    protected $lastName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $birthDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $deathDate = null;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $faxNumber;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $postalCode;

    /**
     * @var \AppBundle\Entity\Address
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Address" ,mappedBy="category", cascade={"persist", "remove"})
     *
     * @ORM\JoinColumn(name="current_address_id", referencedColumnName="id")
     */
    protected $currentAddress;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    protected $FixeNumber;

    /**
     * @return string
     */
    public function getFixeNumber()
    {
        return $this->FixeNumber;
    }

    /**
     * @param string $FixeNumber
     */
    public function setFixeNumber($FixeNumber)
    {
        $this->FixeNumber = $FixeNumber;
    }

    /**
     * @return \AppBundle\Entity\Address
     */
    public function getCurrentAddress()
    {
        return $this->currentAddress;
    }

    /**
     * @param Address $currentAddress
     */
    public function setCurrentAddress($currentAddress)
    {
        $this->currentAddress = $currentAddress;
    }

    /**
     * @var User
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User" ,inversedBy="person" ,cascade={"persist", "remove"})
     */
    protected $userAccount;

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
    public function setName(string $name = null)
    {
        $this->name = $name;
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
    public function setFirstName(string $firstName = null)
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
    public function setLastName(string $lastName = null)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate = null)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return \DateTime
     */
    public function getDeathDate()
    {
        return $this->deathDate;
    }

    /**
     * @param \DateTime $deathDate
     */
    public function setDeathDate(\DateTime $deathDate = null)
    {
        $this->deathDate = $deathDate;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber = null)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFaxNumber()
    {
        return $this->faxNumber;
    }

    /**
     * @param string $faxNumber
     */
    public function setFaxNumber(string $faxNumber = null)
    {
        $this->faxNumber = $faxNumber;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode = null)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return User
     */
    public function getUserAccount()
    {
        return $this->userAccount;
    }

    /**
     * @param User $userAccount
     */
    public function setUserAccount(User $userAccount = null)
    {
        $this->userAccount = $userAccount;
    }
}
