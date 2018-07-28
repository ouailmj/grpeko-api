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


use AppBundle\Entity\Customer;
use AppBundle\Entity\FiscalYear;

class CustomerRepository extends BaseRepository
{


    public function test()
    {
       return $this->createQueryBuilder('b')->
            select('Year(c.startDate)')
                ->from(FiscalYear::class, 'c')
           ->getQuery()
           ->execute();

    }
}