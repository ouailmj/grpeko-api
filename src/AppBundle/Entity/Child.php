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
 * Child
 *
 * @ORM\Table(name="child")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ChildRepository")
 */

class Child
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
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Contact", inversedBy="child",cascade={"persist","remove"})
     */

    protected $contact;

    /**
     * @var string
     * @ORM\Column(name="lastName" ,type="string", nullable=true)
     */

    protected $lastName;

    /**
     * @var string
     * @ORM\Column(name="firstName", type="string", nullable=true)
     */

    protected $firstName;

    /**
     * @var \DateTime
     * @ORM\Column(name="birthDate", type="datetime",nullable=true)
     */

    protected $birthDate;

    /**
     * @var \DateTime
     * @ORM\Column(name="deathDate", type="datetime",nullable=true)
     */

    protected $deathDate;

    /**
     * @var integer
     * @ORM\Column(name="age", type="integer",nullable=true)
     */

    protected $age;



}