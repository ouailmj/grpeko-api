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
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Contact
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 * @UniqueEntity("email")
 * @UniqueEntity("firstname")
 * @ORM\HasLifecycleCallbacks()
 */
class Contact
{
    /**
     * Contact constructor.
     */
    public function __construct()
    {
        $this->weddings = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

        /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customer" ,inversedBy="contacts" ,cascade={"persist"})
     */
    private $customer;

    /**
     * @var ContactStatus
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ContactStatus", inversedBy="contact",cascade={"remove"})
     */
    private $contactStatus;
    /**
     * @var string
     *
     * @ORM\Column(name="civility", type="string", length=10, nullable=true)
     */
    private $civility;

    // * @Assert\NotBlank()
    /**
     * @var string
     * @ORM\Column(name="firstname", type="string", length=50, nullable=true,unique=true)
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
     * @ORM\Column(name="mandataire", type="float", nullable=true)
     */
    private $mandataire;

    /**
     * @var string
     * @ORM\Column(name="email", type="string",length=100,unique=true, nullable=true)
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(name="autoEmailReceipt", type="string",length=20 ,nullable=true)
     */
    private $autoEmailReceipt;

    /**
     * @var string
     * @ORM\Column(name="adressenumber", type="string",length=20 ,nullable=true)
     */
    private $adressenumber;

    /**
     * @var string
     * @ORM\Column(name="adresse", type="string",length=20 ,nullable=true)
     */
    private $adresse;

    /**
     * @var string
     * @ORM\Column(name="city", type="string" ,nullable=true)
     */
    private $city;

    /**
     * @var string
     * @ORM\Column(name="country", type="string" ,nullable=true)
     */
    private $country;

    /**
     * @var string
     * @ORM\Column(name="ekoNews", type="string" ,nullable=true)
     */
    private $ekoNews;

    /**
     * @var string
     * @ORM\Column(name="ekoConseils", type="string" ,nullable=true)
     */
    private $ekoConseils;

    /**
     * @var string
     * @ORM\Column(name="anniversaire", type="string" ,nullable=true)
     */
    private $anniversaire;

    /**
     * @var string
     * @ORM\Column(name="fetes", type="string" ,nullable=true)
     */
    private $fetes;

    /**
     * @var string
     * @ORM\Column(name="maritalSituation", type="string" ,nullable=true)
     */
    private $maritalSituation;

    /**
     * @var string
     * @ORM\Column(name="propreSociety", type="string" ,nullable=true)
     */
    private $propreSociety;

    /**
     * @var string
     * @ORM\Column(name="comment", type="string" ,nullable=true)
     */
    private $comment;

    /**
     * @var integer
     * @ORM\Column(name="childrenNumber", type="integer" ,nullable=true)
     * @Assert\Type("integer")
     */
    private $childrenNumber;

    /**
     * @var float
     * @ORM\Column(name="annualIncome", type="float" ,nullable=true)
     */
    private $annualIncome;

    /**
     * @var string
     * @ORM\Column(name="owner", type="string" ,nullable=true)
     */
    private $owner;

    /**
     * @var string
     * @ORM\Column(name="husbandJob", type="string" ,nullable=true)
     */
    private $husbandJob;

    /**
     * @var string
     * @ORM\Column(name="actifsPlacement", type="string" ,nullable=true)
     */
    private $actifsPlacement;

    /**
     * @var string
     * @ORM\Column(name="passifs", type="string" ,nullable=true)
     */
    private $passifs;

    /**
     * @var string
     * @ORM\Column(name="previousSituation", type="string" ,nullable=true)
     */
    private $previousSituation;

    /**
     * @var string
     * @ORM\Column(name="accre", type="string" ,nullable=true)
     */
    private $accre;

    /**
     * @var string
     * @ORM\Column(name="accreDescription", type="string" ,nullable=true)
     */
    private $accreDescription;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateStartJobPole", type="datetime" ,nullable=true)
     */
    private $dateStartJobPole;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateEndJobPole", type="datetime" ,nullable=true)
     */
    private $dateEndJobPole;

    /**
     * @var string
     * @ORM\Column(name="ARCE_ARE", type="string" ,nullable=true)
     */
    private $ARCE_ARE;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    protected $birthDate;

    /**
     * @var string
     *
     * @ORM\Column(name="associe", type="string"))
     */
    private $associe = false;
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
     * @var Child [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Child",  mappedBy="contact",cascade={"persist","remove"})
     */
    private $children;
    /**
     * @var Wedding [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="Wedding", mappedBy="contact",cascade={"persist","remove"})
     */
    private $weddings;

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
    public function setFaxNumber(string $faxNumber)
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
    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
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
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
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
     * @return \DateTime
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param \DateTime $birthDate
     */
    public function setBirthDate(\DateTime $birthDate=null)
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Company
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Company $customer
     */
    public function setCustomer(Company $customer)
    {
        $this->customer = $customer;
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
     * @return string
     */
    public function getBirthDept()
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
     * @param float $mandataire
     */
    public function setMandataire(float $mandataire)
    {
        $this->mandataire = $mandataire;
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
    public function getAutoEmailReceipt()
    {
        return $this->autoEmailReceipt;
    }

    /**
     * @param string $autoEmailReceipt
     */
    public function setAutoEmailReceipt(string $autoEmailReceipt)
    {
        $this->autoEmailReceipt = $autoEmailReceipt;
    }

    /**
     * @return string
     */
    public function getAdressenumber()
    {
        return $this->adressenumber;
    }

    /**
     * @param string $adressenumber
     */
    public function setAdressenumber(string $adressenumber)
    {
        $this->adressenumber = $adressenumber;
    }

    /**
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * @param string $adresse
     */
    public function setAdresse(string $adresse)
    {
        $this->adresse = $adresse;
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

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getEkoNews()
    {
        return $this->ekoNews;
    }

    /**
     * @param string $ekoNews
     */
    public function setEkoNews(string $ekoNews)
    {
        $this->ekoNews = $ekoNews;
    }

    /**
     * @return string
     */
    public function getEkoConseils()
    {
        return $this->ekoConseils;
    }

    /**
     * @param string $ekoConseils
     */
    public function setEkoConseils(string $ekoConseils)
    {
        $this->ekoConseils = $ekoConseils;
    }

    /**
     * @return string
     */
    public function getAnniversaire()
    {
        return $this->anniversaire;
    }

    /**
     * @param string $anniversaire
     */
    public function setAnniversaire(string $anniversaire)
    {
        $this->anniversaire = $anniversaire;
    }

    /**
     * @return string
     */
    public function getFetes()
    {
        return $this->fetes;
    }

    /**
     * @param string $fetes
     */
    public function setFetes(string $fetes)
    {
        $this->fetes = $fetes;
    }

    /**
     * @return string
     */
    public function getMaritalSituation()
    {
        return $this->maritalSituation;
    }

    /**
     * @param string $maritalSituation
     */
    public function setMaritalSituation(string $maritalSituation)
    {
        $this->maritalSituation = $maritalSituation;
    }

    /**
     * @return string
     */
    public function getPropreSociety()
    {
        return $this->propreSociety;
    }

    /**
     * @param string $propreSociety
     */
    public function setPropreSociety(string $propreSociety)
    {
        $this->propreSociety = $propreSociety;
    }

    /**
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return int
     */
    public function getChildrenNumber()
    {
        return $this->childrenNumber;
    }

    /**
     * @param int $childrenNumber
     */
    public function setChildrenNumber(int $childrenNumber)
    {
        $this->childrenNumber = $childrenNumber;
    }

    /**
     * @return float
     */
    public function getAnnualIncome()
    {
        return $this->annualIncome;
    }

    /**
     * @param float $annualIncome
     */
    public function setAnnualIncome(float $annualIncome)
    {
        $this->annualIncome = $annualIncome;
    }

    /**
     * @return string
     */
    public function getOwner()
    {
        return $this->owner;
    }

    /**
     * @param string $owner
     */
    public function setOwner(string $owner)
    {
        $this->owner = $owner;
    }

    /**
     * @return string
     */
    public function getHusbandJob()
    {
        return $this->husbandJob;
    }

    /**
     * @param string $husbandJob
     */
    public function setHusbandJob(string $husbandJob)
    {
        $this->husbandJob = $husbandJob;
    }

    /**
     * @return string
     */
    public function getActifsPlacement()
    {
        return $this->actifsPlacement;
    }

    /**
     * @param string $actifsPlacement
     */
    public function setActifsPlacement(string $actifsPlacement)
    {
        $this->actifsPlacement = $actifsPlacement;
    }

    /**
     * @return string
     */
    public function getPassifs()
    {
        return $this->passifs;
    }

    /**
     * @param string $passifs
     */
    public function setPassifs(string $passifs)
    {
        $this->passifs = $passifs;
    }

    /**
     * @return string
     */
    public function getPreviousSituation()
    {
        return $this->previousSituation;
    }

    /**
     * @param string $previousSituation
     */
    public function setPreviousSituation(string $previousSituation)
    {
        $this->previousSituation = $previousSituation;
    }

    /**
     * @return string
     */
    public function getAccre()
    {
        return $this->accre;
    }

    /**
     * @param string $accre
     */
    public function setAccre(string $accre)
    {
        $this->accre = $accre;
    }

    /**
     * @return string
     */
    public function getAccreDescription()
    {
        return $this->accreDescription;
    }

    /**
     * @param string $accreDescription
     */
    public function setAccreDescription(string $accreDescription)
    {
        $this->accreDescription = $accreDescription;
    }

    /**
     * @return \DateTime
     */
    public function getDateStartJobPole()
    {
        return $this->dateStartJobPole;
    }

    /**
     * @param \DateTime $dateStartJobPole
     */
    public function setDateStartJobPole(\DateTime $dateStartJobPole=null)
    {
        $this->dateStartJobPole = $dateStartJobPole;
    }

    /**
     * @return \DateTime
     */
    public function getDateEndJobPole()
    {
        return $this->dateEndJobPole;
    }

    /**
     * @param \DateTime $dateEndJobPole
     */
    public function setDateEndJobPole(\DateTime $dateEndJobPole=null)
    {
        $this->dateEndJobPole = $dateEndJobPole;
    }

    /**
     * @return string
     */
    public function getARCEARE()
    {
        return $this->ARCE_ARE;
    }

    /**
     * @param string $ARCE_ARE
     */
    public function setARCEARE(string $ARCE_ARE)
    {
        $this->ARCE_ARE = $ARCE_ARE;
    }



    /**
     * @return ContactStatus
     */
    public function getContactStatus()
    {
        return $this->contactStatus;
    }

    /**
     * @param ContactStatus $contactStatus
     */
    public function setContactStatus(ContactStatus $contactStatus)
    {
        $this->contactStatus = $contactStatus;
    }


}