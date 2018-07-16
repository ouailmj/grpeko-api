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
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * TypeMission.
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
     * @var Category
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Category" ,inversedBy="typeMissions" ,cascade={"persist"})
     */
    private $category;

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

    /**
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param Category $category
     */
    public function setCategory(Category $category)
    {
        $this->category = $category;
    }




}
