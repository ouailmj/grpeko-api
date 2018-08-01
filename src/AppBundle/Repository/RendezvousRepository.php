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
