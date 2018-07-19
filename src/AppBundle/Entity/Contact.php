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
 * Class Contact
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="contact")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ContactRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Contact
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
     * @var ContactStatus
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\ContactStatus", inversedBy="contact")
     */
    private $contactStatus;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }



    /**
     * @return ContactStatus
     */
    public function getContactStatus()
    {
        return $this->contactStatus;
    }

    /**
     * @param ContactStatus $contactStatus
     */
    public function setContactStatus(ContactStatus $contactStatus)
    {
        $this->contactStatus = $contactStatus;
    }


}