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
 * Class Assignment
 * @package AppBundle\Entity
 *
 *
 *
 * @ORM\Table(name="assignment")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AssignmentRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Assignment
{
    /**
     * @var TypeMission [] | ArrayCollection
     * @ORM\ManyToMany(targetEntity="TypeMission", inversedBy="assignments")
     */
    private $typeMissions;

    /**
     * Assignment constructor.
     */
    public function __construct()
    {
        $this->typeMissions = new ArrayCollection();
    }

    /**
     * @return TypeMission[]|ArrayCollection
     */
    public function getTypeMissions()
    {
        return $this->typeMissions;
    }

    /**
     * @param TypeMission[]|ArrayCollection $typeMissions
     */
    public function setTypeMissions($typeMissions)
    {
        $this->typeMissions = $typeMissions;
    }

    /**
     * @param TypeMission $typeMission
     * @return $this
     */
    public function addTypeMission(TypeMission $typeMission)
    {
        $this->typeMissions->add($typeMission);
        return $this;
    }

    /**
     * @param TypeMission $typeMission
     * @return $this
     */
    public function removeTypeMission(TypeMission $typeMission)
    {
        return  $this->typeMissions->removeElement($typeMission);
    }




}