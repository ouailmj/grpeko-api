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

use AppBundle\Entity\Customer;
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

    public function uploadFiles(Customer $company, Rendezvous $rendezvous, String $path)
    {
        $this->moveFile($rendezvous, $path);
        $this->moveCin($rendezvous, $path);
        $company->setRendezvous($rendezvous);
        $rendezvous->setCustomer($company);
        $customerId = $this->em->getRepository(Rendezvous::class)->findById($company->getId());
        if (0 === $customerId) {
            $this->em->persist($rendezvous);
            $this->em->flush();

            return 0;
        }

        return 1;
    }

    public function generateUniqueName()
    {
        return md5(uniqid());
    }

    public function moveFile(Rendezvous $rendezvous, $path)
    {
        $file = $rendezvous->getFichePatrimoniale();
        $fileName = $this->generateUniqueName().'.'.$file->guessExtension();

        $file->move($path, $fileName);
        $rendezvous->setFichePatrimoniale($fileName);
    }

    public function moveCin(Rendezvous $rendezvous, $path)
    {
        $file = $rendezvous->getCin();
        $fileName = $this->generateUniqueName().'.'.$file->guessExtension();
        $file->move($path, $fileName);
        $rendezvous->setCin($fileName);
    }
}
