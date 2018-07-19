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
 * Class Mission
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Mission
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
     * @var Mode
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mode", inversedBy="missions")
     */
    private $mode;

    /**
     * @var TypeMission
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeMission", inversedBy="missions")
     */
    private $typeMission;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Mode
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param Mode $mode
     */
    public function setMode(Mode $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return TypeMission
     */
    public function getTypeMission()
    {
        return $this->typeMission;
    }

    /**
     * @param TypeMission $typeMission
     */
    public function setTypeMission(TypeMission $typeMission)
    {
        $this->typeMission = $typeMission;
    }


}