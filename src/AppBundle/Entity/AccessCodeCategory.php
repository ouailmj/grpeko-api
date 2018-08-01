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
 * Class AccessCodeCategory.
 *
 *
 *
 *
 * @ORM\Table(name="access_code_category")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccessCodeCategoryRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class AccessCodeCategory
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
     * @var AccessCode [] | ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\AccessCode", mappedBy="accessCodeCategory")
     */
    private $accessCodes;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * AccessCodeCategory constructor.
     */
    public function __construct()
    {
        $this->accessCodes = new ArrayCollection();
    }

    /**
     * @return AccessCode[]|ArrayCollection
     */
    public function getAccessCodes()
    {
        return $this->accessCodes;
    }

    /**
     * @param AccessCode[]|ArrayCollection $accessCodes
     */
    public function setAccessCodes($accessCodes)
    {
        $this->accessCodes = $accessCodes;
    }

    /**
     * @param AccessCode $accessCode
     *
     * @return $this
     */
    public function addAccessCode(AccessCode $accessCode)
    {
        $this->accessCodes->add($accessCode);

        return $this;
    }

    /**
     * @param AccessCode $accessCode
     *
     * @return $this
     */
    public function removeAccessCode(AccessCode $accessCode)
    {
        $this->accessCodes->removeElement($accessCode);

        return $this;
    }
}
