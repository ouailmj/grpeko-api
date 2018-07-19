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
 * Class Mode
 * @package AppBundle\Entity
 *
 *
 *
 * @ORM\Table(name="mode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ModeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Mode
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
     * @var Mission [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mission", mappedBy="mode")
     */
    private $missions;

    /**
     * Mode constructor.
     */
    public function __construct()
    {
        $this->missions = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
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
     * @return $this
     */
    public function addMission(Mission $mission)
    {
        $this->missions->add($mission);
        return $this;
    }

    /**
     * @param Mission $mission
     * @return bool
     */
    public function removeMission(Mission $mission)
    {
        return $this->missions->removeElement($mission);
    }




}