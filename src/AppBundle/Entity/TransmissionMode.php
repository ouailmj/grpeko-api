<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;

/**
 * TransmissionMode
 *
 * @ORM\Table(name="transmission_mode")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TransmissionModeRepository")
 * @ApiResource
 */
class TransmissionMode
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
     * @var double
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $mode;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $validDate;


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
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * @param string $mode
     */
    public function setMode(string $mode)
    {
        $this->mode = $mode;
    }

    /**
     * @return \DateTime
     */
    public function getValidDate()
    {
        return $this->validDate;
    }

    /**
     * @param \DateTime $validDate
     */
    public function setValidDate(\DateTime $validDate)
    {
        $this->validDate = $validDate;
    }

}
