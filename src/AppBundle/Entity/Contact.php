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
 * Class Contact
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 *
 * @ORM\HasLifecycleCallbacks()
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
    protected $id;


    /**
     * @var ContactStatus
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ContactStatus", inversedBy="contact")
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
     * @return int
     */
    public function getId()
    {
        return $this->id;
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