<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/27/18
 * Time: 16:33
 */

namespace AppBundle\Repository;

use AppBundle\Entity\User;
class UserRepository extends BaseRepository
{
    public function findByEmail($email)
    {
        $qb=$this->createQueryBuilder("user");
        $cpt= $qb->select('user.email')
            ->from(User::class, 'u')
            ->where('u.email =:email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getResult();


        return count($cpt);
    }
}