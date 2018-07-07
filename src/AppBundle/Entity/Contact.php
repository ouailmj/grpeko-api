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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="contacts" ,cascade={"persist", "remove"})
     */
    protected $company;


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
     * @ORM\Column(name="birthPlace", type="string", length=50, nullable=true)
     */

    private $birthPlace;

    /**
     * @var string
     * @ORM\Column(name="birthDept", type="string", length=50, nullable=true)
     */

    private $birthDept;

    /**
     * @var string
     * @ORM\Column(name="birthCountry", type="string", length=50, nullable=true)
     */

    private $birthCountry;

    /**
     * @var string
     * @ORM\Column(name="nationality", type="string", length=50, nullable=true)
     */

    private $nationality;

    /**
     * @var string
     * @ORM\Column(name="mandaQuality", type="string", length=50, nullable=true)
     */

    private $mandaQuality;

    /**
     * @var string
     * @ORM\Column(name="mandaSocial", type="string", length=50, nullable=true)
     */

    private $mandaSocial;

    /**
     * @var string
     * @ORM\Column(name="tns", type="string", length=50, nullable=true)
     */

    private $tns;

    /**
     * @var string
     * @ORM\Column(name="otherCompany", type="string", length=50, nullable=true)
     */

    private $otherCompany;

    /**
     * @var integer
     * @ORM\Column(name="partNumber", type="integer", nullable=true)
     */

    private $partNumber;

    /**
     * @var float
     * @ORM\Column(name="partNumberPercent", type="float", nullable=true)
     */

    private $partNumberPercent;

    /**
     * @var string
     * @ORM\Column(name="legalForm", type="string", nullable=true)
     */

    private $legalForm;

    /**
     * @var string
     * @ORM\Column(name="socialCapital", type="string", nullable=true)
     */

    private $socialCapital;

    /**
     * @var string
     * @ORM\Column(name="representative", type="string", nullable=true)
     */

    private $representative;

    /**
     * @var string
     * @ORM\Column(name="representativeQuality", type="string", nullable=true)
     */

    private $representativeQuality;

    /**
     * @var string
     * @ORM\Column(name="siren", type="string", nullable=true)
     */

    private $siren;

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
     * @var Wedding [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Wedding", mappedBy="contact",cascade={"persist","remove"})
     */
    private $weddings;

    /**
     * @var child [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Child", mappedBy="contact",cascade={"persist","remove"})
     */
    private $childs;


    /**
     * @param $childs
     * @return $this
     */
    public function addChild($child)
    {
        $this->childs->add($child);
        return $this;
    }

    /**
     * @param $childs
     * @return bool
     */
    public function removeChild($child)
    {
        return $this->childs->removeElement($child);

    }

    /**
     * @param $weddings
     * @return $this
     */
    public function addWedding($wedding)
    {
        $this->weddings->add($wedding);
        return $this;
    }

    /**
     * @param $weddings
     * @return bool
     */
    public function removeWedding($wedding)
    {
        return $this->weddings->removeElement($wedding);

    }

    /**
     * @return ArrayCollection|Wedding[]
     */
    public function getWeddings()
    {
        return $this->weddings;
    }

    /**
     * @param ArrayCollection|Wedding[] $weddings
     */
    public function setWeddings($weddings)
    {
        $this->weddings = $weddings;
    }

    /**
     * @return ArrayCollection|child[]
     */
    public function getChilds()
    {
        return $this->childs;
    }

    /**
     * @param ArrayCollection|child[] $childs
     */
    public function setChilds($childs)
    {
        $this->childs = $childs;
    }

    /**
     * @return string
     */
    public function getBirthCountry()
    {
        return $this->birthCountry;
    }

    /**
     * @param string $birthCountry
     */
    public function setBirthCountry(string $birthCountry)
    {
        $this->birthCountry = $birthCountry;
    }

    /**
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param string $nationality
     */
    public function setNationality(string $nationality)
    {
        $this->nationality = $nationality;
    }

    /**
     * @return string
     */
    public function getMandaQuality()
    {
        return $this->mandaQuality;
    }

    /**
     * @param string $mandaQuality
     */
    public function setMandaQuality(string $mandaQuality)
    {
        $this->mandaQuality = $mandaQuality;
    }

    /**
     * @return string
     */
    public function getMandaSocial()
    {
        return $this->mandaSocial;
    }

    /**
     * @param string $mandaSocial
     */
    public function setMandaSocial(string $mandaSocial)
    {
        $this->mandaSocial = $mandaSocial;
    }

    /**
     * @return string
     */
    public function getTns()
    {
        return $this->tns;
    }

    /**
     * @param string $tns
     */
    public function setTns(string $tns)
    {
        $this->tns = $tns;
    }

    /**
     * @return string
     */
    public function getOtherCompany()
    {
        return $this->otherCompany;
    }

    /**
     * @param string $otherCompany
     */
    public function setOtherCompany(string $otherCompany)
    {
        $this->otherCompany = $otherCompany;
    }

    /**
     * @return int
     */
    public function getPartNumber()
    {
        return $this->partNumber;
    }

    /**
     * @param int $partNumber
     */
    public function setPartNumber(int $partNumber)
    {
        $this->partNumber = $partNumber;
    }

    /**
     * @return float
     */
    public function getPartNumberPercent()
    {
        return $this->partNumberPercent;
    }

    /**
     * @param float $partNumberPercent
     */
    public function setPartNumberPercent(float $partNumberPercent)
    {
        $this->partNumberPercent = $partNumberPercent;
    }

    /**
     * @return string
     */
    public function getLegalForm()
    {
        return $this->legalForm;
    }

    /**
     * @param string $legalForm
     */
    public function setLegalForm(string $legalForm)
    {
        $this->legalForm = $legalForm;
    }

    /**
     * @return string
     */
    public function getSocialCapital()
    {
        return $this->socialCapital;
    }

    /**
     * @param string $socialCapital
     */
    public function setSocialCapital(string $socialCapital)
    {
        $this->socialCapital = $socialCapital;
    }

    /**
     * @return string
     */
    public function getRepresentative()
    {
        return $this->representative;
    }

    /**
     * @param string $representative
     */
    public function setRepresentative(string $representative)
    {
        $this->representative = $representative;
    }

    /**
     * @return string
     */
    public function getRepresentativeQuality()
    {
        return $this->representativeQuality;
    }

    /**
     * @param string $representativeQuality
     */
    public function setRepresentativeQuality(string $representativeQuality)
    {
        $this->representativeQuality = $representativeQuality;
    }

    /**
     * @return string
     */
    public function getSiren()
    {
        return $this->siren;
    }

    /**
     * @param string $siren
     */
    public function setSiren(string $siren)
    {
        $this->siren = $siren;
    }

    /**
     * @return string
     */
    public function getAssocie()
    {
        return $this->associe;
    }

    /**
     * @param string $associe
     */
    public function setAssocie(string $associe)
    {
        $this->associe = $associe;
    }


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
     * @return string
     */
    public function getBirthDept(): string
    {
        return $this->birthDept;
    }

    /**
     * @param string $birthDept
     */
    public function setBirthDept(string $birthDept)
    {
        $this->birthDept = $birthDept;
    }

    /**
     * @return string
     */
    public function getBirthPlace()
    {
        return $this->birthPlace;
    }

    /**
     * @param string $birthPlace
     */
    public function setBirthPlace(string $birthPlace)
    {
        $this->birthPlace = $birthPlace;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="associe", type="string"))
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