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
 * TypeMission.
 *
 * @ORM\Table(name="type_mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeMissionRepository")
 */
class TypeMission
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
     * @var Mission [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mission" ,mappedBy="typeMission" ,cascade={"persist", "remove"})
     */
    private $missions;

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
     * @return Mission[]|ArrayCollection
     */
    public function getMissions()
    {
        return $this->missions;
    }

    /**
     * @param $mission
     *
     * @return $this
     */
    public function addMission($mission)
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
