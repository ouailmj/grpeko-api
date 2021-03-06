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

use ApiPlatform\Core\Annotation\ApiResource;
use AppBundle\AppBundle;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * User.
 *
 * @ORM\Table(name="app__user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 * @ORM\HasLifecycleCallbacks()
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @ApiResource(
 *     itemOperations={
 *     "get",
 *     "put",
 *     "delete",
 *     },
 *     collectionOperations= {
 *     "post",
 *     "api_current_user"={
 *          "route_name"="currentUserAPI",
 *          "method"="GET"
 *      },
 *     "api_sign_up"={"route_name"="signUpAPI"},
 *     "api_avatar_upload" = {
 *         "method"="POST",
 *         "path"="/upload-avatar",
 *         "controller"=UploadAvatarAction::class,
 *         "defaults"={"_api_receive"=false},
 *     },
 *     }
 *)
 */
class User extends BaseUser
{
    const ROLE_COLLABORATOR = 'ROLE_COLLABORATOR';

    const ROLE_ACCOUNTANT = 'ROLE_ACCOUNTANT';

    const ROLE_CUSTOMER = 'ROLE_CUSTOMER';

    const ROLE_PROSPECT = 'ROLE_PROSPECT';

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

    // Transient Properties //

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
    
}
