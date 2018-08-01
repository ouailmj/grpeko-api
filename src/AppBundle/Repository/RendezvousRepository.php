<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/27/18
 * Time: 16:33
 */

namespace AppBundle\Repository;


class RendezvousRepository extends BaseRepository
{
    public function findByID($id)
    {
        return count($this->createQueryBuilder('r')
            ->where('r.customer = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->execute());
    }
}