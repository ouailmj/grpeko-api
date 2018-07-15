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
