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
 * Class QuotationLine
 * @package AppBundle\Entity
 *
 * @ORM\Table(name="quotation_line")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuotationLineRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class QuotationLine
{
    /**
     * @var ECQuotation
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ECQuotation", inversedBy="quotationLines")
     */
    private $ecQuotation;

    /**
     * @var Mission
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Mission")
     * @ORM\JoinColumn(name="mission_id", referencedColumnName="id")
     */
    private $mission;

    /**
     * @return ECQuotation
     */
    public function getEcQuotation()
    {
        return $this->ecQuotation;
    }

    /**
     * @param ECQuotation $ecQuotation
     */
    public function setEcQuotation(ECQuotation $ecQuotation)
    {
        $this->ecQuotation = $ecQuotation;
    }

    /**
     * @return Mission
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * @param Mission $mission
     */
    public function setMission(Mission $mission)
    {
        $this->mission = $mission;
    }






}