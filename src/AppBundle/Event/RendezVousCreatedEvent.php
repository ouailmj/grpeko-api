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

namespace AppBundle\Event;

use AppBundle\Entity\Company;
use AppBundle\Entity\Customer;
use Symfony\Component\EventDispatcher\Event;

class RendezVousCreatedEvent extends Event
{
    private $prospect;
    private $data;

    public function __construct(Customer $prospect, array $data)
    {
        $this->prospect = $prospect;
        $this->data = $data;
    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @return Customer
     */
    public function getProspect()
    {
        return $this->prospect;
    }

    /**
     * @param Company $prospect
     */
    public function setProspect(Customer $prospect)
    {
        $this->prospect = $prospect;
    }
}
