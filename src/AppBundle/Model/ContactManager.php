<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 7/11/18
 * Time: 11:23
 */

namespace AppBundle\Model;


use AppBundle\Entity\Contact;
use Doctrine\ORM\EntityManagerInterface;

class ContactManager
{
    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createContact(Contact $contact)
    {
        $this->em->persist($contact);
        $this->em->flush();
    }

    public function editContact(Contact $contact)
    {
        $this->em->flush();
    }

    public function deleteContact(Contact $contact)
    {
        $this->em->remove($contact);
        $this->em->flush();
    }
}