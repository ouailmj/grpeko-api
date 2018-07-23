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
 * Class Address
 * @package AppBundle\Entity
 *
 *
 *
 * @ORM\Table(name="address")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AddressRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Address
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
     * @ORM\Column(type="text", nullable=true)
     */
    protected $description;
<<<<<<< HEAD
=======

>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $postalCode;
<<<<<<< HEAD
=======

>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=150, nullable=true)
     */
    protected $city;
<<<<<<< HEAD
=======

>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $email;
<<<<<<< HEAD
    /**
     * @var Person
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Person" ,inversedBy="currentAddress")
     */
    // protected $category;
=======

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
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
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city)
    {
        $this->city = $city;
    }

>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }
<<<<<<< HEAD
=======

>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
<<<<<<< HEAD
    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $leftAt = null;
    /**
     * Get id.
     *
=======


    /**
>>>>>>> cdc67786fc3b0546c7cd56109720f04bd3519903
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * @return Person
     */
    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @param Person $category
     */
    public function setCategory(Person $category)
    {
        $this->category = $category;
    }
    /**
     * @param string $description
     *
     * @return Address
     */
    public function setDescription(string $description)
    {
        $this->description = $description;
        return $this;
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
     *
     * @return Address
     */
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
        return $this;
    }
    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }
    /**
     * @param string $city
     *
     * @return Address
     */
    public function setCity(string $city)
    {
        $this->city = $city;
        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getLeftAt()
    {
        return $this->leftAt;
    }
    /**
     * @param \DateTime $leftAt
     */
    public function setLeftAt(\DateTime $leftAt)
    {
        $this->leftAt = $leftAt;
    }
}
