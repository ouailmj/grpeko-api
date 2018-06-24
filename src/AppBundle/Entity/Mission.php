<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Mission
 *
 * @ORM\Table(name="mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionRepository")
 */
class Mission
{

    /**
     * Mission constructor.
     * @param FiscalYear[]|ArrayCollection $exercices
     */
    public function __construct()
    {
        $this->exercices = new ArrayCollection();
    }


    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetime",nullable=true)
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime",nullable=true)
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetime",nullable=true)
     */
    private $closeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstExeciceStartDate", type="datetime",nullable=true)
     */
    private $firstExeciceStartDate;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="missions")
     */
    private $company;

    /**
     * @var FiscalYear [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\FiscalYear", mappedBy="mission",cascade={"persist"})

    private $exercices;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastExerciceEndDate", type="datetime",nullable=true)
     */
    private $lastExerciceEndDate;


    /**
     * @var TypeMission
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeMission" ,inversedBy="missions" ,cascade={"persist"})
     */
    private $typeMission;


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
     * Set startDate.
     *
     * @param \DateTime $startDate
     *
     * @return Mission
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;

        return $this;
    }

    /**
     * Get startDate.
     *
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * Set endDate.
     *
     * @param \DateTime $endDate
     *
     * @return Mission
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;

        return $this;
    }

    /**
     * Get endDate.
     *
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * Set closeDate.
     *
     * @param \DateTime $closeDate
     *
     * @return Mission
     */
    public function setCloseDate($closeDate)
    {
        $this->closeDate = $closeDate;

        return $this;
    }

    /**
     * Get closeDate.
     *
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * Set firstExeciceStartDate.
     *
     * @param \DateTime $firstExeciceStartDate
     *
     * @return Mission
     */
    public function setFirstExeciceStartDate($firstExeciceStartDate)
    {
        $this->firstExeciceStartDate = $firstExeciceStartDate;

        return $this;
    }

    /**
     * Get firstExeciceStartDate.
     *
     * @return \DateTime
     */
    public function getFirstExeciceStartDate()
    {
        return $this->firstExeciceStartDate;
    }

    /**
     * Set lastExerciceEndDate.
     *
     * @param \DateTime $lastExerciceEndDate
     *
     * @return Mission
     */
    public function setLastExerciceEndDate($lastExerciceEndDate)
    {
        $this->lastExerciceEndDate = $lastExerciceEndDate;

        return $this;
    }

    /**
     * Get lastExerciceEndDate.
     *
     * @return \DateTime
     */
    public function getLastExerciceEndDate()
    {
        return $this->lastExerciceEndDate;
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
     * @return FiscalYear[]|ArrayCollection
     */
    public function getExercices()
    {
        return $this->exercices;
    }

    /**
     * @param $exercice
     * @return $this
     */
    public function addExercice(FiscalYear $exercice)
    {
        $this->exercices->add($exercice);
        return $this;
    }

    /**
     * @param $exercice
     * @return bool
     */
    public function removeExercice($exercice)
    {
        return $this->exercices->removeElement($exercice);

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
    public function setTypeMission(TypeMission $typeMission=null)
    {
        $this->typeMission = $typeMission;
    }

}
