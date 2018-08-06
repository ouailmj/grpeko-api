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

namespace AppBundle\Model;

use AppBundle\Mailer\Mailer;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManager;

class UserManager
{
    /**
     * @var \FOS\UserBundle\Doctrine\UserManager
     */
    private $fosUserManager;

    /** @var Mailer */
    private $mailer;

    /**
     * @var EntityManager
     */
    private $em;

    /**
     * UserManager constructor.
     *
     * @param Mailer                               $mailer
     * @param \FOS\UserBundle\Doctrine\UserManager $fosUserManager
     * @param EntityManager                        $em
     */
    public function __construct(\FOS\UserBundle\Doctrine\UserManager $fosUserManager,Mailer $mailer, EntityManager $em)
    {
        $this->fosUserManager = $fosUserManager;
        $this->em = $em;
    }

    /**
     * @param User $user
     */
    public function createUser(User $user, $flush = true)
    {
        $plainPassword = $user->getPlainPassword();

        $this->fosUserManager->updateUser($user, $flush);

        $user->setPlainPassword($plainPassword);
    }

    /**
     * @param $username
     *
     * @return \FOS\UserBundle\Model\UserInterface|User|null
     */
    public function findUserByUsernameOrEmail($username)
    {
        return $this->fosUserManager->findUserByUsernameOrEmail($username);
    }

    /**
     * @param User $user
     * @param bool $sendMail
     *
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function updatePassword(User $user, $sendMail = true, $flush = true)
    {
        $plainPassword = $user->getPlainPassword();
        $this->fosUserManager->updatePassword($user);
        if($flush) $this->em->flush();
        $user->setPlainPassword($plainPassword);
        $user->eraseCredentials();
    }
}
