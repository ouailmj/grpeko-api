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

use AppBundle\Entity\FiscalYear;
use Doctrine\ORM\EntityManagerInterface;

class FiscalManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createFiscal(FiscalYear $fiscal)
    {
        $this->em->persist($fiscal);
        $this->em->flush();
    }

    public function editFiscal(FiscalYear $fiscal)
    {
        $this->em->flush();
    }

    public function deleteFiscal(FiscalYear $fiscal)
    {
        $this->em->remove($fiscal);
        $this->em->flush();
    }
}
