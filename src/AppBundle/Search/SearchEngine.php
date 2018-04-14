<?php

/*
 * This file is part of the Napier project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Developed by MIT <contact@mit-agency.com>
 *
 */

namespace AppBundle\Search;

use Doctrine\ORM\EntityManagerInterface;

class SearchEngine
{
    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * DoctrineEngine constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    /**
     * Search in classes. The query should respect this format :
     * array(
     *  'FullyQualifiedClass' => array(
     *      'field1'=> 'token1',
     *      'field2'=> 'token2'
     *   )
     * )
     * Exp:
     * $query = array(
     *  Product::Class => array(
     *      'name'=> 'car',
     *      'desc'=> 'car'
     *      )
     * ).
     *
     * @param $query
     *
     * @return array
     */
    public function search($query)
    {
        $result = [];
        foreach (array_keys($query) as $type) {
            $result[$type] = $this->searchInSearchable($this->getClassName($type), $query[$type]);
        }

        return $result;
    }

    public function searchByClass($class, $filters)
    {
        /** @var \Doctrine\ORM\QueryBuilder $qcl */
        $qcl = $this->em->getRepository($this->getClassName($class))->createQueryBuilder('cl');

        $searchvalues = $filters;
        $token = $searchvalues['token'];
        $fromDate = $searchvalues['dateStart'];
        $toDate = $searchvalues['dateEnd'];

        if (!empty($toDate) && !empty($fromDate) && $toDate instanceof \DateTime) {
            $toDate->modify('+1 day');

            $qcl
                ->where('cl.createdAt BETWEEN :fromDate and :toDate')
                ->setParameter('fromDate', $fromDate)
                ->setParameter('toDate', $toDate);
        }

        if (!empty($token)) {
            $qcl
                ->andWhere($qcl->expr()->orX('cl.shortDesc like :token', 'cl.action like :token'))
                ->setParameter('token', '%'.$token.'%');
        }
        if (!empty($user = $searchvalues['user'])) {
            $qcl->andWhere('cl.user = :user')
                ->setParameter('user', $user)
            ;
        }
        if (!empty($customer = $searchvalues['customer'])) {
            $qcl->innerJoin('cl.record', 'cl_record');
            $qcl->andWhere($qcl->expr()->orX('cl.customer = :customer', 'cl_record.customer = :customer'))
                ->setParameter('customer', $customer)
            ;
        }

        return $qcl
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $searchableClass
     * @param array $criteria
     *
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function buildQuery($searchableClass, array $criteria)
    {
        $qb = $this->em->createQueryBuilder();
        $qb->select('sb')
            ->from($searchableClass, 'sb');
        foreach (array_keys($criteria) as $field) {
            $qb->orWhere($qb->expr()->like('sb.'.$field, '\'%'.$criteria[$field].'%\''));
        }

        return $qb;
    }

    private function getClassName($type)
    {
        return $type
            ? $this->em->getClassMetadata($type)->getName()
            : null
            ;
    }

    private function searchInSearchable($searchableClass, array $criteria)
    {
        if (empty($searchableClass)) {
            return [];
        }
        $qb = $this->buildQuery($searchableClass, $criteria);

        return $qb->getQuery()->getResult();
    }
}
