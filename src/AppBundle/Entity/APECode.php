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
 * Class APECode.
 *
 *
 * @ORM\Table(name="ape_code")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\APECodeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class APECode
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
     * Forme juridique.
     *
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @var Company [] | ArrayCollection
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Company", mappedBy="apeCode")
     */
    private $companies;

    /**
     * APECode constructor.
     */
    public function __construct()
    {
        $this->companies = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name = null)
    {
        $this->name = $name;
    }

    /**
     * @return Company[]|ArrayCollection
     */
    public function getCompanies()
    {
        return $this->companies;
    }

    /**
     * @param Company[]|ArrayCollection $companies
     */
    public function setCompanies($companies)
    {
        $this->companies = $companies;
    }

    /**
     * @param Company $company
     *
     * @return $this
     */
    public function addCompany(Company $company)
    {
        $this->companies->add($company);

        return $this;
    }

    /**
     * @param Company $company
     *
     * @return bool
     */
    public function removeCompany(Company $company)
    {
        return $this->companies->removeElement($company);
    }
}
