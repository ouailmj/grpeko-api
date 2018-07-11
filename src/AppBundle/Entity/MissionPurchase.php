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
 * MissionPurchase.
 *
 * @ORM\Table(name="mission_purchase")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionPurchaseRepository")
 */
class MissionPurchase
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
     * @var Mission[] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="Mission")
     * @ORM\JoinTable(name="mission_purchase_mission",
     *      joinColumns={@ORM\JoinColumn(name="mission_purchase_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="mission_id", referencedColumnName="id", unique=true)}
     *      )
     */
    protected $missions;

    /**
     * @var Quotation
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Quotation" ,inversedBy="missionPurchase")
     */
    protected $quotation;

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
     * @return MissionPurchase
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
     * @return MissionPurchase
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
     * @return MissionPurchase
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
     * Set lastFiscalEndDate.
     *
     * @param \DateTime $lastFiscalEndDate
     *
     * @return MissionPurchase
     */
    public function setLastFiscalEndDate($lastFiscalEndDate)
    {
        $this->lastFiscalEndDate = $lastFiscalEndDate;

        return $this;
    }

    /**
     * Get lastFiscalEndDate.
     *
     * @return \DateTime
     */
    public function getLastFiscalEndDate()
    {
        return $this->lastFiscalEndDate;
    }

    /**
     * Set firstFiscalStartDate.
     *
     * @param \DateTime $firstFiscalStartDate
     *
     * @return MissionPurchase
     */
    public function setFirstFiscalStartDate($firstFiscalStartDate)
    {
        $this->firstFiscalStartDate = $firstFiscalStartDate;

        return $this;
    }

    /**
     * Get firstFiscalStartDate.
     *
     * @return \DateTime
     */
    public function getFirstFiscalStartDate()
    {
        return $this->firstFiscalStartDate;
    }

    /**
     * @return Mission[]|ArrayCollection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param Mission[]|ArrayCollection $missions
     */
    public function setMissions($missions)
    {
        $this->missions = $missions;
    }

    /**
     * @param Mission $mission
     *
     * @return $this
     */
    public function addMission(Mission $mission)
    {
        $this->missions->add($mission);

        return $this;
    }

    /**
     * @param $mission
     *
     * @return bool
     */
    public function removeMission($mission)
    {
        return $this->missions->removeElement($mission);
    }
}
