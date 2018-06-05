<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FormerAccountant
 *
 * @ORM\Table(name="former_accountant")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FormerAccountantRepository")
 */
class FormerAccountant extends LegalEntity
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
     * @var Company
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Company" ,inversedBy="formerAccountant" ,cascade={"persist", "remove"}))
     */
    protected $company;

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
     * @return Company
     */
    public function getCompany(): Company
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
