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

use AppBundle\Entity\Rendezvous;
use Doctrine\ORM\EntityManagerInterface;

class RendezVousManager
{
    private $em;

    /**
     * RendezVous constructor.
     *
     * @param $uploader
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function uploadFiles(Rendezvous $rendezvous, String $path)
    {
        $file = $rendezvous->getFichePatrimoniale();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($path, $fileName);
        $rendezvous->setFichePatrimoniale($fileName);

        $file = $rendezvous->getCin();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($path, $fileName);
        $rendezvous->setCin($fileName);

        $this->em->persist($rendezvous);
        $this->em->flush();
    }
}
