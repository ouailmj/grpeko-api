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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="rendezvous")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RendezvousRepository")
 */
class Rendezvous
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
     * @ORM\Column(type="string")
     */

    private $fichePatrimoniale;

    /**
     * @ORM\Column(type="string")

     */

    private $cin;

    /**
     * @return mixed
     */
    public function getCin()
    {
        return $this->cin;
    }/**
     * @param mixed $cin
     */
    public function setCin($cin)
    {
        $this->cin = $cin;
    }

    /**
     * @return mixed
     */
    public function getFichePatrimoniale()
    {
        return $this->fichePatrimoniale;
    }

    /**
     * @param mixed $fichePatrimoniale
     */
    public function setFichePatrimoniale($fichePatrimoniale)
    {
        $this->fichePatrimoniale = $fichePatrimoniale;
    }
}
