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

    public function deleteClient($company)
    {
        $this->em->remove($company);
        $this->em->flush();
    }

    public function editClient()
    {
        $this->em->flush();
    }

    public function createClient($company,$formcompany)
    {
            $email = array_map(function($contacts) {
                return $contacts->getEmail();
            }, $formcompany->get('contacts')->getData()->toArray());

            $name = array_map(function($contacts) {
                return $contacts->getFirstname();
            }, $formcompany->get('contacts')->getData()->toArray());

            $password= rand(100000,1000000);
            $company->setCustomerAccount(new Customer());
            $company->getCustomerAccount()->setName($name[0]);
            $company->getCustomerAccount()->setUserAccount(new User());
            $company->getCustomerAccount()->getUserAccount()->setEmail($email[0]);
            $company->getCustomerAccount()->getUserAccount()->setPlainPassword($password);

            if ($company->getCustomerAccount()->getUserAccount() instanceof User)
                $this->userManager->createUser($company->getCustomerAccount()->getUserAccount(), false);

            $this->em->persist($company);
            $this->em->flush();

    }

}