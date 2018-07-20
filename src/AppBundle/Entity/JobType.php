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
 * Class JobType
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="job_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobTypeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class JobType
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
     * @var Job [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Job", mappedBy="jobType")
     */
    private $jobs;



    /**
     * JobType constructor.
     */
    public function __construct()
    {
        $this->jobs = new ArrayCollection();
    }


    /**
     * @return Job[]|ArrayCollection
     */
    public function getJobs()
    {
        return $this->jobs;
    }

    /**
     * @param Job $jobs
     */
    public function setJobs(Job $jobs)
    {
        $this->jobs = $jobs;
    }

    /**
     * @param Job $job
     * @return $this
     */
    public function addJob(Job $job)
    {
        $this->jobs->add($job);
        return $this;
    }

    /**
     * @param Job $job
     * @return bool
     */
    public function removeJob(Job $job)
    {
        return $this->jobs->removeElement($job);
    }

}