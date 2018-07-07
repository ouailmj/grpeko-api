<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/6/18
 * Time: 21:58
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wedding
 *
 * @ORM\Table(name="wedding")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WeddingRepository")
 */
class Wedding
{

    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */

    private $id;

    /**
     * @var Contact
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contact", inversedBy="wedding",cascade={"persist","remove"})
     */

    protected $contact;

    /**
     * @var string
     * @ORM\Column(name="matrimonialRegime", type="string", nullable=true)
     */

    protected $matrimonialRegime;

    /**
     * @var \DateTime
     * @ORM\Column(name="startsDate", type="datetime",nullable=true)
     */

    protected $startsDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="endsDate", type="datetime",nullable=true)
     */

    protected $endsDate;

}