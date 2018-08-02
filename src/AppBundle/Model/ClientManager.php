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
use AppBundle\Entity\CustomerStatus;
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
        return $this->em->getRepository('AppBundle:Customer')->findAll();
    }

    public function deleteClient(Company $company)
    {
        $this->em->remove($company);
        $this->em->flush();
    }

    public function editClient(Customer $company)
    {
        foreach ($company->getFiscalYears() as $fiscal) {
            $fiscal->setCustomer($company);
        }
        foreach ($company->getContacts() as $cn) {
            $cn->setCustomer($company);
        }
        $this->em->flush();
        $code = 'Client' === $company->getCustomerStatus()->getStatus() ? 'C'.$company->getId() : 'P'.$company->getId();
        $company->setCode($code);
        $this->em->flush();
    }

    public function createClient(Customer $prospect, array $contacts = null)
    {
        $test = 0;
        if (null !== $contacts) {
            $prospect->addContact($this->newContact($contacts));
            $prospect->setUser($this->newUserClient($contacts));
            $test = 0;
        } else {
            $email = $prospect->getContacts()->first()->getEmail();
            $this->setProspectStatut($prospect);
            $prospect->setUser($this->newUserProspect($email));
            $test = 1;
        }

        if (($user = $prospect->getUser()) instanceof User) {
            if (empty($account = $this->userManager->findUserByUsernameOrEmail($user->getEmail()))) {
                $this->userManager->createUser($prospect->getUser(), false);
            }
        }
        $this->affectationCustomerId($prospect, $test);
        $this->em->persist($prospect);
        $this->em->flush();
        $this->codeClientSave($prospect);
    }

    public function generatePassword()
    {
        return rand(100000, 1000000);
    }

    public function newUserProspect(string $email)
    {
        $user = new User();
        $user->setPlainPassword($this->generatePassword());
        $user->setEmail($email);
        $user->addRole(User::ROLE_PROSPECT);

        return $user;
    }

    public function newUserClient(array $contacts)
    {
        $user = new User();
        $user->setPlainPassword($this->generatePassword());
        //$user->setUsername($contacts[0]);
        $user->setEmail($contacts[2]);
        $user->addRole(User::ROLE_CUSTOMER);

        return $user;
    }

    public function newContact(array $contacts)
    {
        $contact = new Contact();
        //$contact->setFirstname($contacts[0]);
        $contact->setLastname($contacts[1]);
        $contact->setEmail($contacts[2]);

        return $contact;
    }

    public function affectationCustomerId(Customer $customer, $test)
    {
        foreach ($customer->getContacts() as $c) {
            $c->setCustomer($customer);
        }
        if (0 === $test) {
            foreach ($customer->getFiscalYears() as $fiscalYear) {
                $fiscalYear->setCustomer($customer);
            }
            $customer->getApeCode()->setCompanies([$customer]);
            $customer->getLegalForm()->setCompanies([$customer]);
            $customer->getTaxSystem()->setCompanies([$customer]);
            $customer->getVatSystem()->setCompanies([$customer]);
        }
    }

    public function codeClientNew(Customer $prospect)
    {
        return 'Client' === $prospect->getCustomerStatus()->getStatus() ? 'C'.$prospect->getId() : 'P'.$prospect->getId();
    }

    public function codeClientSave(Customer $prospect)
    {
        $prospect->setCode($this->codeClientNew($prospect));
        $this->em->flush();
    }

    public function setProspectStatut(Customer $prospect)
    {
        $CustomerStatut = new CustomerStatus();
        $CustomerStatut->setStatus('Prospect');
        $prospect->setCustomerStatus($CustomerStatut);
    }
}
