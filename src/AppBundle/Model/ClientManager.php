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

use AppBundle\Entity\Company;
use AppBundle\Entity\Contact;
use AppBundle\Entity\Customer;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class ClientManager
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /** @var UserManager */
    private $userManager;

    public function __construct(EntityManagerInterface $em, UserManager $userManager)
    {
        $this->userManager = $userManager;
        $this->em = $em;
    }

    public function findAllClients()
    {
        return $this->em->getRepository('AppBundle:Company')->findAll();
    }

    public function deleteClient(Company $company)
    {
        $this->em->remove($company);
        $this->em->flush();
    }

    public function editClient()
    {
        $this->em->flush();
    }

    public function createClient(Company $prospect, array $contacts = null)
    {
        //  $email = array_map(function($contacts){
        //     return $contacts->getEmail();
        //  }, $formcompany->get('contacts')->getData()->toArray());

        //  $name = array_map(function($contacts) {
        //     return $contacts->getFirstname();
        // }, $formcompany->get('contacts')->getData()->toArray());

        $password = rand(100000, 1000000);
        $prospect->setCustomerAccount(new Customer());

        $prospect->getCustomerAccount()->setUserAccount(new User());
        $prospect->getCustomerAccount()->getUserAccount()->setPlainPassword($password);

        if (null !== $contacts) {
            $contact = new Contact();
            $contact->setFirstname($contacts[0]);
            $contact->setLastname($contacts[1]);
            $contact->setEmail($contacts[2]);
            $prospect->getCustomerAccount()->setName($contacts[0]);
            $prospect->getCustomerAccount()->getUserAccount()->setEmail($contacts[2]);
            $prospect->addContact($contact);
        } else {
            $prospect->getCustomerAccount()->getUserAccount()->setEmail($prospect->getContacts()->first()->getEmail());
        }

        if (($user = $prospect->getCustomerAccount()->getUserAccount()) instanceof User) {
            if (empty($account = $this->userManager->findUserByUsernameOrEmail($user->getEmail()))) {
                $this->userManager->createUser($prospect->getCustomerAccount()->getUserAccount(), false);
            } else {
                $prospect->getCustomerAccount()->setUserAccount($account);
            }
            $user->addRole(User::ROLE_PROSPECT);
        }

        foreach ($prospect->getContacts() as $c) {
            $c->setCompany($prospect);
        }

        foreach ($prospect->getFiscalYears() as $fiscalYear) {
            $fiscalYear->setCompany($prospect);
        }

        $this->em->persist($prospect);
        $this->em->flush();
    }
}
