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
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * Class Mission
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="mission")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MissionRepository")
 *
 * @ApiResource(
 *
 *  attributes ={
 *     "normalization_context"={"groups"={"mission"}},
 *     }
 * )
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
     *  @Groups({"type_mission","mission"})
     */
    protected $id;

    /**
     * @var Mode
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mode", inversedBy="missions")
     * @Groups({"mission"})
     */
    private $mode;

    /**
     * @var TypeMission
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\TypeMission", inversedBy="missions")
     * @Groups({"mission"})
     */
    private $typeMission;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     * @Groups({"mission"})
     */
    private $isCalculateFromTheTimeRetained = false;

    /**
     * @var int
     * @ORM\Column(type="integer", nullable=true)
     * @Groups({"mission"})
     */
    private $defaultNumberPerYear;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"mission"})
     */
    private $unitTime;

    /**
     * @var float
     * @ORM\Column(type="float", nullable=true)
     * @Groups({"mission"})
     */
    private $fixedAmount;

    /**
     * @var float
     *
     * @ORM\Column(name="price", type="float")
     * @Groups({"type_mission","mission"})
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type = "string")
     *  @Groups({"type_mission","mission"})
     */
    private $title;

    /**
     * @var double
     * @ORM\Column(type = "float")
     * @Groups({"type_mission","mission"})
     */
    private $time;

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

    /**
     * @return string
     */
    public function getTitle()
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
    public function getTime()
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
     * @return float
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice(float $price)
    {
        $this->price = $price;
    }

    /**
     * @return bool
     */
    public function getIsCalculateFromTheTimeRetained()
    {
        return $this->isCalculateFromTheTimeRetained;
    }

    /**
     * @param bool $isCalculateFromTheTimeRetained
     */
    public function setIsCalculateFromTheTimeRetained(bool $isCalculateFromTheTimeRetained)
    {
        $this->isCalculateFromTheTimeRetained = $isCalculateFromTheTimeRetained;
    }

    /**
     * @return int
     */
    public function getDefaultNumberPerYear()
    {
        return $this->defaultNumberPerYear;
    }

    /**
     * @param int $defaultNumberPerYear
     */
    public function setDefaultNumberPerYear($defaultNumberPerYear)
    {
        $this->defaultNumberPerYear = $defaultNumberPerYear;
    }

    /**
     * @return float
     */
    public function getUnitTime()
    {
        return $this->unitTime;
    }

    /**
     * @param float $unitTime
     */
    public function setUnitTime( $unitTime)
    {
        $this->unitTime = $unitTime;
    }

    /**
     * @return float
     */
    public function getFixedAmount()
    {
        return $this->fixedAmount;
    }

    /**
     * @param float $fixedAmount
     */
    public function setFixedAmount($fixedAmount)
    {
        $this->fixedAmount = $fixedAmount;
    }



}