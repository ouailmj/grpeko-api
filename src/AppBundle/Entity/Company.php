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
 * Class Company
 * @package AppBundle\Entity
 *
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CompanyRepository")
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({
 *     "company"="Company",
 *     "customer"="Customer",
 *     })
 *
 * @ORM\HasLifecycleCallbacks()
 */
class Company
{
    /**
     * @var APECode
     * @ORM\ManyToOne(targetEntity="APECode")
     * @ORM\JoinColumn(name="ape_code_id", referencedColumnName="id")
     */
    private $apeCode;
    /**
     * @var LegalForm
     * @ORM\ManyToOne(targetEntity="LegalForm")
     * @ORM\JoinColumn(name="legal_form_id", referencedColumnName="id")
     */
    private $legalForm;

    /**
     * @return APECode
     */
    public function getApeCode()
    {
        return $this->apeCode;
    }

    /**
     * @param APECode $apeCode
     */
    public function setApeCode(APECode $apeCode)
    {
        $this->apeCode = $apeCode;
    }



}