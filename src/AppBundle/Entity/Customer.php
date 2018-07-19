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

/**
 * Class Customer
 * @package AppBundle\Entity
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CustomerRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Customer extends Company
{

    /**
     * @var JobQuotation
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\JobQuotation", inversedBy="customer")
     */
    private $jobQuotation;

    /**
     * @var Calendar
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Calendar", inversedBy="customer")
     */
    private $calendar;

    /**
     * @return JobQuotation
     */
    public function getJobQuotation()
    {
        return $this->jobQuotation;
    }

    /**
     * @param JobQuotation $jobQuotation
     */
    public function setJobQuotation(JobQuotation $jobQuotation)
    {
        $this->jobQuotation = $jobQuotation;
    }

    /**
     * @return Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param Calendar $calendar
     */
    public function setCalendar(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }




}