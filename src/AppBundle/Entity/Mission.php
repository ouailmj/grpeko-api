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
     * @var string
     * @ORM\Column(type = "string")
     *  @Groups({"type_mission"})
     */
    private $title;
    /**
     * @var double
     * @ORM\Column(type = "float")
     * @Groups({"type_mission"})
     */
    private $time;
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
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return float
     */
    public function getTime(): float
    {
        return $this->time;
    }

    /**
     * @param float $time
     */
    public function setTime(float $time)
    {
        $this->time = $time;
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