<?php

/*
 * This file is part of the Napier project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User.
 *
 * @ORM\Table(name="app_user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @ApiResource()
 */
class User extends BaseUser
{
    const ROLE_COLLABORATOR = 'ROLE_COLLABORATOR';

    const ROLE_ACCOUNTANT = 'ROLE_ACCOUNTANT';

    const ROLE_CUSTOMER = 'ROLE_CUSTOMER';

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="facebook_id", type="string", length=255, nullable=true)
     */
    protected $facebookId = '';

    /**
     * @ORM\Column(name="google_id", type="string", length=255, nullable=true)
     */
    protected $googleId = '';

    /**
     * @var string
     * @ORM\Column( type="string", length=20, nullable=true)
     */
    protected $phoneNumber;

    /**
     * @var string
     *
     * @ORM\Column( type="string", length=250, nullable=true)
     */
    protected $fullName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=250, nullable=true)
     */
    protected $lastName;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    protected $initials;

    /**
     * @var string
     * @ORM\Column( type="string", length=50, nullable=true)
     */
    protected $timezoneId;

    /**
     * @var Role[]|ArrayCollection
     *
     * @ORM\ManyToMany(targetEntity="\AppBundle\Entity\Role", inversedBy="users")
     */
    protected $tableRoles;

    // Transient Properties //

    protected $facebookAccessToken;

    protected $googleAccessToken;

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
     * @return mixed
     */
    public function getFacebookId()
    {
        return $this->facebookId;
    }

    /**
     * @param mixed $facebookId
     *
     * @return User
     */
    public function setFacebookId($facebookId)
    {
        $this->facebookId = $facebookId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFacebookAccessToken()
    {
        return $this->facebookAccessToken;
    }

    /**
     * @param mixed $facebookAccessToken
     *
     * @return User
     */
    public function setFacebookAccessToken($facebookAccessToken)
    {
        $this->facebookAccessToken = $facebookAccessToken;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoogleId()
    {
        return $this->googleId;
    }

    /**
     * @param mixed $googleId
     *
     * @return User
     */
    public function setGoogleId($googleId)
    {
        $this->googleId = $googleId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getGoogleAccessToken()
    {
        return $this->googleAccessToken;
    }

    /**
     * @param mixed $googleAccessToken
     *
     * @return User
     */
    public function setGoogleAccessToken($googleAccessToken)
    {
        $this->googleAccessToken = $googleAccessToken;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     *
     * @return User
     */
    public function setUsernameValue()
    {
        if (empty($this->username)) {
            $this->username = $this->email;
        }

        return $this;
    }

    public function __construct()
    {
        parent::__construct();
        $this->enabled = true;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param string $phoneNumber
     */
    public function setPhoneNumber(string $phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * @param string $fullName
     */
    public function setFullName(string $fullName)
    {
        $this->fullName = $fullName;
    }

    /**
     * @return string
     */
    public function getTimezoneId()
    {
        return $this->timezoneId;
    }

    /**
     * @param string $timezoneId
     */
    public function setTimezoneId(string $timezoneId)
    {
        $this->timezoneId = $timezoneId;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName(string $lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitials()
    {
        return $this->initials;
    }

    /**
     * @param string $initials
     *
     * @return User
     */
    public function setInitials(string $initials)
    {
        $this->initials = $initials;

        return $this;
    }

    /**
     * Add tableRole.
     *
     * @param Role $tableRole
     *
     * @return User
     */
    public function addTableRole(Role $tableRole)
    {
        $this->tableRoles[] = $tableRole;

        return $this;
    }

    /**
     * Remove tableRole.
     *
     * @param Role $tableRole
     */
    public function removeTableRole(Role $tableRole)
    {
        $this->tableRoles->removeElement($tableRole);
    }

    /**
     * Get tableRoles.
     *
     * @return \Doctrine\Common\Collections\ArrayCollection|Role[]
     */
    public function getTableRoles()
    {
        return $this->tableRoles;
    }

    public function getRoles()
    {
        $roles = parent::getRoles();

        foreach ($this->tableRoles as $role) {
            $roles[] = $role->getRole();
        }

        return array_unique($roles);
    }
}
