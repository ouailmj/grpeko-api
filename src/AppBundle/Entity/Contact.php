<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Contact
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 */
class Contact
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="contacts" ,cascade={"persist", "remove"})
     */
    protected $company;


    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=10, nullable=true))
     */

    private $civility;


    /**
     * @var string
     *
     * @ORM\Column(name="firstname", type="string", length=50, nullable=true))
     */

    private $firstname;


    /**
     * @var string
     *
     * @ORM\Column(name="lastname", type="string", length=50, nullable=true))
     */

    private $lastname;

    /**
     * @var string
     *
     * @ORM\Column(name="intermediate", type="string", length=50, nullable=true))
     * @Assert\NotBlank()
     */

    private $intermediate;

    /**
     * @var float
     *
     * @ORM\Column(name="mandataire", type="float", nullable=true))
     */

    private $mandataire;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string",length=100))
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


}
