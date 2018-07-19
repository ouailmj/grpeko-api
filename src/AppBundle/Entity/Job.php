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
}