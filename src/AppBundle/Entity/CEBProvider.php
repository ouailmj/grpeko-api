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
 * Class CEBProvider
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="ceb_provider")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CEBProviderRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class CEBProvider
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
     * @var CEBMandate [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\CEBMandate", mappedBy="cebProvider")
     */
    private $cebMandates;

    /**
     * CEBProvider constructor.
     */
    public function __construct()
    {
        $this->cebMandates = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return CEBMandate[]|ArrayCollection
     */
    public function getCebMandates()
    {
        return $this->cebMandates;
    }

    /**
     * @param CEBMandate[]|ArrayCollection $cebMandates
     */
    public function setCebMandates($cebMandates)
    {
        $this->cebMandates = $cebMandates;
    }

    /**
     * @param CEBMandate $CEBMandate
     * @return $this
     */
    public function addCebMandate(CEBMandate $CEBMandate)
    {
        $this->cebMandates->add($CEBMandate);
        return $this;
    }

    /**
     * @param CEBMandate $CEBMandate
     * @return bool
     */
    public function removeCebMandate(CEBMandate $CEBMandate)
    {
        return  $this->cebMandates->removeElement($CEBMandate);
    }


}