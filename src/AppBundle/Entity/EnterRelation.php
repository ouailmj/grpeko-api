<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * EnterRelation
 *
 * @ORM\Table(name="enter_relation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnterRelationRepository")
 * @UniqueEntity("typeMission")
 */
class EnterRelation
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
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="enterRelation" ,cascade={"persist", "remove"})
     */
    private $company;

    /**
     * @var TypeMission
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\TypeMission")
     * @ORM\JoinColumn(name="type_mission_id", referencedColumnName="id")
     */
    private $typeMission;

    /**
     * Apporteur
     *
     * @var Employee
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Employee" ,inversedBy="enterRelations" )
     */
    private $contributor;

    /**
     * @var bool
     *
     * @ORM\Column(name="societe_creer", type="boolean", nullable=true))
     */

     private $societe_creer;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation", type="date", nullable=true))
     * @Assert\Date()
     */

     private $date_creation = null;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_cloture", type="date", nullable=true))
     * @Assert\Date()
     */

     private $date_cloture = null;

    /**
     * @var string
     *
     * @ORM\Column(name="integralite", type="string"))
     */

    private $integralite;

    /**
     * @var string
     *
     * @ORM\Column(name="IRPP", type="string", length=10))
     */

    private $IRPP;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_creation_souhaiter", type="date", nullable=true))
     * @Assert\Date()
     */

    private $date_creation_souhait = null;

    /**
     * @var string
     *
     * @ORM\Column(name="zone", type="string", length=10))
     */

     private $zone;

    /**
     * @return \DateTime
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * @param \DateTime $date_creation
     */
    public function setDateCreation(\DateTime $date_creation= null)
    {
        $this->date_creation = $date_creation;
    }

    /**
     * @return \DateTime
     */
    public function getDateCloture()
    {
        return $this->date_cloture;
    }

    /**
     * @param \DateTime $date_cloture
     */
    public function setDateCloture(\DateTime $date_cloture=null)
    {
        $this->date_cloture = $date_cloture;
    }

    /**
     * @return string
     */
    public function getIntegralite()
    {
        return $this->integralite;
    }

    /**
     * @param string $integralite
     */
    public function setIntegralite(string $integralite)
    {
        $this->integralite = $integralite;
    }

    /**
     * @return string
     */
    public function getIRPP()
    {
        return $this->IRPP;
    }

    /**
     * @param string $IRPP
     */
    public function setIRPP(string $IRPP)
    {
        $this->IRPP = $IRPP;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreationSouhait()
    {
        return $this->date_creation_souhait;
    }

    /**
     * @param \DateTime $date_creation_souhait
     */
    public function setDateCreationSouhait(\DateTime $date_creation_souhait=null)
    {
        $this->date_creation_souhait = $date_creation_souhait;
    }

    /**
     * @return string
     */
    public function getZone()
    {
        return $this->zone;
    }

    /**
     * @param string $zone
     */
    public function setZone(string $zone)
    {
        $this->zone = $zone;
    }

    /**
     * @var array
     *
     * @ORM\Column(type="array",nullable=TRUE))
     */

     private $societeactuelle;

    /**
     * @var array
     *
     * @ORM\Column(type="array",nullable=TRUE))
     */

    private $holding;

    /**
     * @var array
     *
     * @ORM\Column(type="array",nullable=TRUE))
     */

    private $epargne;

    /**
     * @return array
     */
    public function getSocieteactuelle()
    {
        return $this->societeactuelle;
    }

    /**
     * @param array $societeactuelle
     */
    public function setSocieteactuelle(array $societeactuelle)
    {
        $this->societeactuelle = $societeactuelle;
    }

    /**
     * @return array
     */
    public function getHolding()
    {
        return $this->holding;
    }

    /**
     * @param array $holding
     */
    public function setHolding(array $holding)
    {
        $this->holding = $holding;
    }


    /**
     * @return array
     */
    public function getEpargne()
    {
        return $this->epargne;
    }

    /**
     * @param array $epargne
     */
    public function setEpargne(array $epargne)
    {
        $this->epargne = $epargne;
    }

    /**
     * @return \DateTime
     */
    public function getSocieteactuelleDate()
    {
        return $this->societeactuelle_date;
    }

    /**
     * @param \DateTime $societeactuelle_date
     */
    public function setSocieteactuelleDate(\DateTime $societeactuelle_date=null)
    {
        $this->societeactuelle_date = $societeactuelle_date;
    }

    /**
     * @return \DateTime
     */
    public function getHoldingDate()
    {
        return $this->holding_date;
    }

    /**
     * @param \DateTime $holding_date
     */
    public function setHoldingDate(\DateTime $holding_date=null)
    {
        $this->holding_date = $holding_date;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="societeactuelle_date", type="date", nullable=true))
     * @Assert\Date()
     */
    private $societeactuelle_date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="holding_date", type="date", nullable=true))
     * @Assert\Date()
     */
    private $holding_date;

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
     * @return bool
     */
    public function getSocieteCreer()
    {
        return $this->societe_creer;
    }

    /**
     * @param bool $societe_creer
     */
    public function setSocieteCreer(bool $societe_creer)
    {
        $this->societe_creer = $societe_creer;
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
     * @return Employee
     */
    public function getContributor()
    {
        return $this->contributor;
    }

    /**
     * @param Employee $contributor
     */
    public function setContributor(Employee $contributor)
    {
        $this->contributor = $contributor;
    }

    /**
     * @return TypeMission
     */
    public function getTypeMission()
    {
        return $this->typeMission;
    }

    /**
     * @param TypeMission $typeMission
     */
    public function setTypeMission(TypeMission $typeMission)
    {
        $this->typeMission = $typeMission;
    }



}
