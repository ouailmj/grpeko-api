<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/2/18
 * Time: 15:59
 */

namespace AppBundle\Model;


use Doctrine\ORM\EntityManagerInterface;
use AppBundle\Entity\Rendezvous;

class RendezVousManager
{

    private $em;

    /**
     * RendezVous constructor.
     * @param $uploader
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
   }

    public function uploadFiles(Rendezvous $rendezvous,String $path)
    {
        $rendezvous->getFichePatrimoniale();
        $file = $rendezvous->getFichePatrimoniale();
        $fileName = md5(uniqid()).'.'.$file->guessExtension();
        $file->move($path, $fileName);
        $rendezvous->setFichePatrimoniale($fileName);
        $this->em->persist($rendezvous);
        $this->em->flush();
    }



}