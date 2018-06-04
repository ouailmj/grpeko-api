<?php

/*
 * This file is part of the Napier project.
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
 * FiscalYear.
 *
 * @ORM\Table(name="fiscal_year")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FiscalYearRepository")
 */
class FiscalYear
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
     * @var \DateTime
     *
     * @ORM\Column(name="startDate", type="datetimetz")
     */
    protected $startDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="closeDate", type="datetimetz")
     */
    protected $closeDate;

    /**
     * @var string
     *
     * @ORM\Column(name="status", type="string", length=10)
     */
    protected $status;

    /**
     * @var string
     *
     * @ORM\Column(type="integer")
     */
    protected $year;

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
     * @return FiscalYear
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
     * Set closeDate.
     *
     * @param \DateTime $closeDate
     *
     * @return FiscalYear
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
     * Set status.
     *
     * @param string $status
     *
     * @return FiscalYear
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }
}
