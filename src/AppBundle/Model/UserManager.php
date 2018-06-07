<?php
/**
 * Created by PhpStorm.
 * User: mohamed
 * Date: 03/08/17
 * Time: 09:27 م
 */

namespace AppBundle\Model;


use AppBundle\Entity\User;
use AppBundle\Mailer\Mailer;
use Doctrine\ORM\EntityManager;
use Symfony\Component\VarDumper\VarDumper;

class UserManager
{
    /**
     * @var \FOS\UserBundle\Doctrine\UserManager
     */
    private $fosUserManager;


    /**
     * @var EntityManager
     */
    private $em;

    /**
     * UserManager constructor.
     * @param \FOS\UserBundle\Doctrine\UserManager $fosUserManager
     * @param EntityManager $em
     */
    public function __construct(\FOS\UserBundle\Doctrine\UserManager $fosUserManager,EntityManager $em)
    {
        $this->fosUserManager = $fosUserManager;
        $this->em = $em;
    }


    /**
     * @param User $user
     * @param bool $flush
     */
    public function createUser(User $user, $flush=true)
    {
        $plainPassword = $user->getPlainPassword();

        $this->fosUserManager->updateUser($user, $flush);

        $user->setPlainPassword($plainPassword);
    }



  


 
}
