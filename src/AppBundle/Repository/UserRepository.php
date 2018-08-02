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

namespace AppBundle\Repository;

use AppBundle\Entity\User;

class UserRepository extends BaseRepository
{
    public function findByEmail($email)
    {
        $qb = $this->createQueryBuilder('user');
        $cpt = $qb->select('user.email')
            ->from(User::class, 'u')
            ->where('u.email =:email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult();

        return count($cpt);
    }
}
