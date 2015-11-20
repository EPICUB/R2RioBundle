<?php

namespace Epic\R2RioBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;

/**
 * R2SearchAirportRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class R2SearchAirportRepository extends EntityRepository
{
    public function update(R2SearchAirport $entity)
    {
        $this->_em->persist($entity);
        $this->_em->flush();
    }

    public function remove(R2SearchAirport $entity)
    {
        $this->_em->remove($entity);
        $this->_em->flush();
    }

    public function datableElement($response, $start = 0, $limit = 10, $order = array(), $filter ='')
    {
        $query = $this->createQueryBuilder('entity');
        $query->innerJoin('entity.searchResponse', 'response');
        $query->where($query->expr()->eq('response.id',':responseId'));
        $query->setParameter('responseId', $response);
        $query->setFirstResult($start);
        $query->setMaxResults($limit);
        if(!empty($order)) {
            switch($order['column']) {
                case 1:
                    $query->addOrderBy('entity.name',$order['dir']);
                    break;
                case 2:
                    $query->addOrderBy('entity.pos',$order['dir']);
                    break;
                default:
                    $query->addOrderBy('entity.code', $order['dir']);
            }
        }

        if(!empty($filter)) {
            $query = $this->addQueryFilter($query, $filter);
        }

        return $query->getQuery()->getResult();
    }

    public function getCountTotal($response)
    {
        $query = $this->createQueryBuilder('entity');
        $query->innerJoin('entity.searchResponse', 'response');
        $query->where($query->expr()->eq('response.id',':responseId'));
        $query->setParameter('responseId', $response);
        $query->select($query->expr()->count('entity.id'));
        return $query->getQuery()->getSingleScalarResult();
    }

    public function getFilterTotal($response, $filter)
    {
        $query = $this->createQueryBuilder('entity');
        $query->innerJoin('entity.searchResponse', 'response');
        $query->where($query->expr()->eq('response.id',':responseId'));
        $query->setParameter('responseId', $response);
        $query->select($query->expr()->count('entity.id'));
        $query = $this->addQueryFilter($query, $filter);

        return $query->getQuery()->getSingleScalarResult();
    }

    private function addQueryFilter(QueryBuilder $query, $filter)
    {
        $expr = $query->expr();
        /*$query->orWhere($expr->eq('entity.id', ':filter_int'));*/
        $query->andWhere($query->expr()->orX(
            $expr->like('entity.code',':filter_str'),
            $expr->like('entity.name',':filter_str')
        ));
        /*$query->setParameter('filter_int', $filter);*/
        $query->setParameter('filter_str', '%'.$filter.'%');

        return $query;
    }
}