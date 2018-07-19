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
 * Class JobQuotation
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="job_quotation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\JobQuotationRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "job_quotation"="JobQuotation",
 *     "ec_quotation"="ECQuotation",
 *     "mex_quotation"="MEXQuotation",
 *     "cac_quotation"="CACQuotation",
 *     })
 *
 * @ORM\HasLifecycleCallbacks()
 */
class JobQuotation
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
     * @var Job
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Job", inversedBy="jobQuotations")
     */
    private $job;

    /**
     * @var Customer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customer", inversedBy="jobQuotations")
     */
    private $customer;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return Job
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * @param Job $job
     */
    public function setJob(Job $job)
    {
        $this->job = $job;
    }

    /**
     * @return Customer
     */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }




}