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
     * @ORM\Column(name="startDate", type="datetime")
     */
    private $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endDate", type="datetime")
     */
    private $endDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetime")
     */
    private $closeDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstExeciceStartDate", type="datetime")
     */
    private $firstExeciceStartDate;

    /**
     * @var Company
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Company", inversedBy="missions")
     */
    private $company;

    /**
     * @var Exercice [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Exercice", mappedBy="mission")
     */
    private $exercices;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastExerciceEndDate", type="datetime")
     */
    private $lastExerciceEndDate;


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
    public function getCompany(): Company
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
     * @return Exercice[]|ArrayCollection
     */
    public function getExercices()
    {
        return $this->exercices;
    }

    /**
     * @param $exercice
     * @return $this
     */
    public function addExercice($exercice)
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


}
