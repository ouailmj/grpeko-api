<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * TypeMission
 *
 * @ORM\Table(name="type_mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeMissionRepository")
 *
 * @ApiResource(
 *
 *  attributes ={
 *     "normalization_context"={"groups"={"type_mission"}},
 *}
 *     )
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
     * @var string
     * @ORM\Column(type="string")
     * @Groups({"type_mission"})
     */
    private $type;

    /**
     * @var Mission [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Mission" ,mappedBy="typeMission" ,cascade={"persist", "remove"})
     *
     * @Groups({"type_mission"})
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
     * @return $this
     */
    public function addMission($mission)
    {
        $this->missions->add($mission);
        return $this;
    }

    /**
     * @param $mission
     * @return bool
     */
    public function removeMission($mission)
    {
        return $this->missions->removeElement($mission);

    }

    /**
     * @return string
     */
    public function getType(): string
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
