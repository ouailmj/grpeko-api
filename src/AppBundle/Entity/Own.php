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
 * Class Own
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="own")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\OwnRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Own
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
     * @var Invoices
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Invoice", inversedBy="owns")
     */
    private $invoice;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return Invoices
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param Invoices $invoice
     */
    public function setInvoice(Invoices $invoice)
    {
        $this->invoice = $invoice;
    }





}