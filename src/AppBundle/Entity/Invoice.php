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
 * Invoice.
 *
 * @ORM\Table(name="invoice")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\InvoiceRepository")
 */
class Invoice
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
     * @var CustomerStatus
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CustomerStatus", inversedBy="invoices")
     */
    private $customerStatus;

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
     * @return CustomerStatus
     */
    public function getCustomerStatus(): CustomerStatus
    {
        return $this->customerStatus;
    }

    /**
     * @param CustomerStatus $customerStatus
     */
    public function setCustomerStatus(CustomerStatus $customerStatus)
    {
        $this->customerStatus = $customerStatus;
    }
}
