<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 * @UniqueEntity("email")
 */
class Contact extends Person
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
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="contacts" ,cascade={"persist", "remove"})
     */
    protected $company;

    /**
     * @var Child [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Child",  mappedBy="contact")
     */
    private $children;

    /**
     * @var Wedding [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Wedding", mappedBy="contact")
     */
    private $weddings;


    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=10, nullable=true)
     */

    private $civility;


    /**
     * @var string
     * @Assert\NotBlank()
     * @ORM\Column(name="firstname", type="string", length=50, nullable=true)
     */

    private $firstname;


    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=true)
     */

    private $lastname;

    /**
     * @var string
     * @ORM\Column(name="intermediate", type="string", length=50, nullable=true)
     */

    private $intermediate;

    /**
     * @var float
     *
     * @ORM\Column(name="mandataire", type="float", nullable=true)
     */

    private $mandataire;

    /**
     * @var string
     * @Assert\Valid
     * @ORM\Column(name="email", type="string",length=100,unique=true)
     */
    private $email;

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @var boolean
     *
     * @ORM\Column(name="associe", type="boolean"))
     */

    private $associe = false;

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getIntermediate()
    {
        return $this->intermediate;
    }

    /**
     * @param string $intermediate
     */
    public function setIntermediate(string $intermediate)
    {
        $this->intermediate = $intermediate;
    }

    /**
     * @return float
     */
    public function getMandataire()
    {
        return $this->mandataire;
    }

    /**
     * @param float mandataire
     */
    public function setMandataire(float $mandataire)
    {
        $this->mandataire = $mandataire;
    }

    /**
     * @return bool
     */
    public function isAssocie()
    {
        return $this->associe;
    }

    /**
     * @param bool $associe
     */
    public function setAssocie(bool $associe)
    {
        $this->associe = $associe;
    }



    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }

    /**
     * @return Child[]|ArrayCollection
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param Child[]|ArrayCollection $children
     */
    public function setChildren($children)
    {
        $this->children = $children;
    }


    public function addChild(Child $child)
    {
        $this->children->add($child);
        return $this;
    }

    public function removeChild(Child $child)
    {
        return $this->children->removeElement($child);
    }

    /**
     * @return Wedding[]|ArrayCollection
     */
    public function getWeddings()
    {
        return $this->weddings;
    }

    /**
     * @param Wedding[]|ArrayCollection $weddings
     */
    public function setWeddings($weddings)
    {
        $this->weddings = $weddings;
    }


    public function addWedding(Wedding $wedding)
    {
        $this->weddings->add($wedding);
        return $this;
    }

    public function removeWedding(Wedding $wedding)
    {
        return $this->weddings->removeElement($wedding);
    }

}
