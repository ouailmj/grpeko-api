<?php


namespace AppBundle\Event;

use AppBundle\Entity\Company;
use Symfony\Component\EventDispatcher\Event;

class RendezVousCreatedEvent extends Event
{

    private $prospect;
    private $data;



    public function __construct(Company $prospect ,array $data) {

        $this->prospect=$prospect;
        $this->data=$data;
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
     * @return Company
     */
    public function getProspect()
    {
        return $this->prospect;
    }

    /**
     * @param Company $prospect
     */
    public function setProspect(Company $prospect)
    {
        $this->prospect = $prospect;
    }


}