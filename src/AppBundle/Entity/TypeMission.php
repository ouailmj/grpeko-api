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

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Class TypeMission.
 *
 *
 * @ORM\Table(name="type_mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeMissionRepository")
 *
 * @ApiResource(
 *
 *  attributes ={
 *     "normalization_context"={"groups"={"type_mission"}},
 *     }
 * )
 * @ORM\HasLifecycleCallbacks()
 */
class TypeMission
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *  @Groups({"mission"})
     */
    protected $id;

    /**
     * @var Mission [] | ArrayCollection
     *
     * @Groups({"type_mission"})
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mission", mappedBy="typeMission")
     */
    private $missions;

    /**
     * @var Assignment [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="Assignment", mappedBy="typeMissions")
     */
    private $assignments;

    /**
     * @var string
     * @ORM\Column(type="string")
     * @Groups({"type_mission","mission"})
     */
    private $type;

    /**
     * TypeMission constructor.
     */
    public function __construct()
    {
        $this->missions = new ArrayCollection();
        $this->assignments = new ArrayCollection();
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
     *
     * @return $this
     */
    public function addMission(Mission $mission)
    {
        $this->missions->add($mission);

        return $this;
    }

    /**
     * @param Mission $mission
     *
     * @return bool
     */
    public function removeMission(Mission $mission)
    {
        return $this->missions->removeElement($mission);
    }

    /**
     * @return Assignment[]|ArrayCollection
     */
    public function getAssignments()
    {
        return $this->assignments;
    }

    /**
     * @param Assignment[]|ArrayCollection $assignments
     */
    public function setAssignments($assignments)
    {
        $this->assignments = $assignments;
    }

    /**
     * @param Assignment $assignment
     *
     * @return $this
     */
    public function addAssignment(Assignment $assignment)
    {
        $this->assignments->add($assignment);

        return $this;
    }

    /**
     * @param Assignment $assignment
     *
     * @return bool
     */
    public function removeAssignment(Assignment $assignment)
    {
        return $this->assignments->removeElement($assignment);
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType(string $type)
    {
        $this->type = $type;
    }
}
