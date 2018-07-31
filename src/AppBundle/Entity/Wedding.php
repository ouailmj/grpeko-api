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
 * Wedding.
 *
 * @ORM\Table(name="wedding")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeddingRepository")
 */
class Wedding
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
     *
     * @ORM\Column(name="matrimonialRegime", type="string", length=255,nullable=true)
     */
    private $matrimonialRegime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="startsDate", type="datetime",nullable=true)
     */
    private $startsDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="endsDate", type="datetime",nullable=true)
     */
    private $endsDate;

    /**
     * @var Contact
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contact" ,inversedBy="weddings")
     */
    private $contact;

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
     * Set matrimonialRegime.
     *
     * @param string $matrimonialRegime
     *
     * @return Wedding
     */
    public function setMatrimonialRegime($matrimonialRegime)
    {
        $this->matrimonialRegime = $matrimonialRegime;

        return $this;
    }

    /**
     * Get matrimonialRegime.
     *
     * @return string
     */
    public function getMatrimonialRegime()
    {
        return $this->matrimonialRegime;
    }

    /**
     * Set startsDate.
     *
     * @param \DateTime $startsDate
     *
     * @return Wedding
     */
    public function setStartsDate($startsDate)
    {
        $this->startsDate = $startsDate;

        return $this;
    }

    /**
     * Get startsDate.
     *
     * @return \DateTime
     */
    public function getStartsDate()
    {
        return $this->startsDate;
    }

    /**
     * Set endsDate.
     *
     * @param \DateTime $endsDate
     *
     * @return Wedding
     */
    public function setEndsDate($endsDate)
    {
        $this->endsDate = $endsDate;

        return $this;
    }

    /**
     * Get endsDate.
     *
     * @return \DateTime
     */
    public function getEndsDate()
    {
        return $this->endsDate;
    }

    /**
     * @return Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param Contact $contact
     */
    public function setContact(Contact $contact)
    {
        $this->contact = $contact;
    }
}