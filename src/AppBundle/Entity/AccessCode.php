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
 * Class AccessCode.
 *
 *
 *
 * @ORM\Table(name="access_code")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccessCodeRepository")
 *
 * @ORM\HasLifecycleCallbacks()
 */
class AccessCode
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
     * @var Customer
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Customer", inversedBy="accessCodes")
     */
    private $customer;

    /**
     * @var AccessCodeCategory
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\AccessCodeCategory", inversedBy="accessCodes")
     */
    private $accessCodeCategory;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }

    /**
     * @param Customer $customer
     */
    public function setCustomer(Customer $customer)
    {
        $this->customer = $customer;
    }

    /**
     * @return AccessCodeCategory
     */
    public function getAccessCodeCategory()
    {
        return $this->accessCodeCategory;
    }

    /**
     * @param AccessCodeCategory $accessCodeCategory
     */
    public function setAccessCodeCategory(AccessCodeCategory $accessCodeCategory)
    {
        $this->accessCodeCategory = $accessCodeCategory;
    }
}
