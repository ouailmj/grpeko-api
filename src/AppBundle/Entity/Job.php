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
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Job
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="job")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Job
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
     * @var JobType
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\JobType", inversedBy="jobs")
     */
    private $jobType;

    /**
     * @var JobQuotation [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\JobQuotation", mappedBy="job")
     */
    private $jobQuotations;

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
     * @ORM\Column(name="lastFiscalEndDate", type="datetime")
     */
    private $lastFiscalEndDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="firstFiscalStartDate", type="datetime")
     */
    private $firstFiscalStartDate;

    /**
     * Job constructor.
     */
    public function __construct()
    {
        $this->jobQuotations = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return JobType
     */
    public function getJobType()
    {
        return $this->jobType;
    }

    /**
     * @param JobType $jobType
     */
    public function setJobType(JobType $jobType)
    {
        $this->jobType = $jobType;
    }

    /**
     * @return JobQuotation[]|ArrayCollection
     */
    public function getJobQuotations()
    {
        return $this->jobQuotations;
    }

    /**
     * @param JobQuotation[]|ArrayCollection $jobQuotations
     */
    public function setJobQuotations($jobQuotations)
    {
        $this->jobQuotations = $jobQuotations;
    }

    /**
     * @param JobQuotation $jobQuotation
     * @return $this
     */
    public function addJobQuotation(JobQuotation $jobQuotation)
    {
        $this->jobQuotations->add($jobQuotation);
        return $this;
    }

    public function removeJobQuoation(JobQuotation $jobQuotation)
    {
        return $this->jobQuotations->removeElement(($jobQuotation));
    }

    /**
     * @return \DateTime
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param \DateTime $startDate
     */
    public function setStartDate(\DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return \DateTime
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param \DateTime $endDate
     */
    public function setEndDate(\DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return \DateTime
     */
    public function getCloseDate()
    {
        return $this->closeDate;
    }

    /**
     * @param \DateTime $closeDate
     */
    public function setCloseDate(\DateTime $closeDate)
    {
        $this->closeDate = $closeDate;
    }

    /**
     * @return \DateTime
     */
    public function getLastFiscalEndDate()
    {
        return $this->lastFiscalEndDate;
    }

    /**
     * @param \DateTime $lastFiscalEndDate
     */
    public function setLastFiscalEndDate(\DateTime $lastFiscalEndDate)
    {
        $this->lastFiscalEndDate = $lastFiscalEndDate;
    }

    /**
     * @return \DateTime
     */
    public function getFirstFiscalStartDate()
    {
        return $this->firstFiscalStartDate;
    }

    /**
     * @param \DateTime $firstFiscalStartDate
     */
    public function setFirstFiscalStartDate(\DateTime $firstFiscalStartDate)
    {
        $this->firstFiscalStartDate = $firstFiscalStartDate;
    }


}