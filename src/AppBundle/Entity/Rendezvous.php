<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/2/18
 * Time: 09:54
 */

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
* @ORM\Table(name="rendezvous")
* @ORM\Entity(repositoryClass="AppBundle\Repository\RendezvousRepository")
*/
class Rendezvous
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * @ORM\Column(type="string")
     * @Assert\File(maxSize = "10M", mimeTypes={ "application/vnd.ms-excel","application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" })
     */
    private $fichePatrimoniale;

    /**
     * @return mixed
     */
    public function getFichePatrimoniale()
    {
        return $this->fichePatrimoniale;
    }

    /**
     * @param mixed $fichePatrimoniale
     */
    public function setFichePatrimoniale($fichePatrimoniale)
    {
        $this->fichePatrimoniale = $fichePatrimoniale;
    }


}