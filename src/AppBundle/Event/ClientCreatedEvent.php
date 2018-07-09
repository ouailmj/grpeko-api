<?php


namespace AppBundle\Event;

use AppBundle\Entity\Company;
use Symfony\Component\EventDispatcher\Event;

class ClientCreatedEvent extends Event
{

    private $company;

    public function __construct(Company $company) {

       $this->company=$company;
   }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param Company $company
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;
    }







}