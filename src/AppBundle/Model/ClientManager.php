<?php
/**
 * Created by PhpStorm.
 * User: nejjarimouad
 * Date: 6/28/18
 * Time: 09:01
 */

namespace AppBundle\Model;

use AppBundle\Entity\Company;
use AppBundle\Entity\User;
use AppBundle\Entity\Customer;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
use Doctrine\ORM\EntityManagerInterface;



class ClientManager
{

    /**
     * @var EntityManagerInterface
     */
    private $em;

    /** @var  UserManager */
    private $userManager;


    public function __construct(EntityManagerInterface $em,  UserManager $userManager)
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

    public function createClient(Company $prospect)
    {
          //  $email = array_map(function($contacts) {
           //     return $contacts->getEmail();
          //  }, $formcompany->get('contacts')->getData()->toArray());

          //  $name = array_map(function($contacts) {
           //     return $contacts->getFirstname();
           // }, $formcompany->get('contacts')->getData()->toArray());

        $password= rand(100000,1000000);
        $prospect->setCustomerAccount(new Customer());
        $prospect->getCustomerAccount()->setName($prospect->getContacts()->getLastname());
        $prospect->getCustomerAccount()->setUserAccount(new User());
        $prospect->getCustomerAccount()->getUserAccount()->setEmail($prospect->getContacts()->getEmail());
        $prospect->getCustomerAccount()->getUserAccount()->setPlainPassword($password);

        if ($prospect->getCustomerAccount()->getUserAccount() instanceof User)

            $this->userManager->createUser($prospect->getCustomerAccount()->getUserAccount(), false);
            $prospect->getCustomerAccount()->getUserAccount()->setRoles(array("ROLE_PROSPECT"));
            $prospect->getContacts()->setCompany($prospect);

        foreach ($prospect->getFiscalYears() as $fiscalYear) {
            $fiscalYear->setCompany($prospect);
         }
            $this->em->persist($prospect);
            $this->em->flush();

    }

}